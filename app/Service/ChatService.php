<?php


namespace App\Service;

use App\Events\PusherBroadcast;
use App\Repositories\ChatRepository;
use App\Repositories\UserRepository;


class ChatService extends BaseService
{
    protected $repository;
    protected $userRepository;
    protected $dataProcessorService;
    public function __construct(
        ChatRepository $repository,
        UserRepository $userRepository,
        DataProcessorService $dataProcessorService
    ) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->dataProcessorService = $dataProcessorService;
    }

    public function getHistory($chatId)
    {
        $history = $this->repository->getHistory($chatId);

        if ($history->isEmpty())
            return ['success' => false, 'message' => 'No chat history found'];

        return ['success' => true, 'data' => $history];
    }

    public function broadcast($inputs, $user)
    {
        if (is_null($user->chat_id) || $user->chat_id == '') {
            $user->chat_id = $inputs['channel'];
            $user->save();
        }

        $dataInsert = [];
        $data = ['message' => $inputs['message']];
        $now = now();
        $botMessage = null;
        if (!isset($inputs['admin'])) {
            if ($user->is_chatbot == true) {
                $res = $this->dataProcessorService->chatbot($inputs);
                if ($res['success'] == true) {

                    $dataInsert[] = [
                        'chat_id' => $inputs['channel'],
                        'message' => $res['data']['answer'],
                        'user_name' => 'BOT',
                        'is_customer' => false,
                        'created_at' => $now->copy()->addSeconds(1),
                        'updated_at' => $now->copy()->addSeconds(1),
                    ];
                    $botMessage = $res['data']['answer'];

                    $data = [
                        ...$data,
                        'user' => $res['data']['user'],
                        'answer' => $res['data']['answer'],
                    ];
                }
            }
        }
        broadcast(new PusherBroadcast(
            $inputs['channel'],
            $user->name,
            $inputs['message'],
            $botMessage ?? "NULL"
        ));

        $dataInsert[] = [
            'chat_id' => $inputs['channel'],
            'message' => $inputs['message'],
            'user_name' => $user->name,
            'is_customer' => isset($inputs['admin']) ? false : true,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $this->repository->insert($dataInsert);

        return ['success' => true, 'data' => $data];
    }
}