<?php

namespace App\Service;

use App\Events\PusherBroadcast;
use GuzzleHttp\Client;


class DataProcessorService
{
	protected $url = 'data-processor-service';
	protected $client;

	public function __construct()
	{
		$this->client = new Client();
	}

	public function productInteraction($userId, $cookieId, $productId)
	{
		$data = [
			'user_id' => $userId == '' ? 0 : $userId,
			'cookie_id' => $cookieId,
			'product_id' => $productId,
		];
		$url = $this->url . '/api/v1/product-interaction';
		$response = $this->client->post($url, [
			'json' => $data,
		]);
		return $response->getBody()->getContents();
	}

	public function generateKeywords($productId, $text)
	{
		$url = $this->url . '/api/v1/generate-keywords/' . $productId . '?text=' . urlencode($text);
		$response = $this->client->post($url, [
			'json' => []
		]);
		return $response->getBody()->getContents();
	}

	public function recommendKeywords($query)
	{
		$url = $this->url . '/api/v1/search-keyword?query=' . $query;
		$response = $this->client->get($url);
		$array = json_decode($response->getBody()->getContents(), true);
		if (count($array) <= 0)
			return [
				'success' => false,
			];
		return [
			'success' => true,
			'data' => $array,
		];
	}

	public function chatbot($inputs)
	{
		$url = $this->url . '/api/v1/chat-bot';

		$response = $this->client->post($url, [
			'json' => $inputs['message'],
		]);

		$res = $response->getBody()->getContents();

		$res = json_decode($res, true);
		if (isset($res['user'])) {
			$res['data'] = [
				'user' => $res['user'],
				'answer' => $res['answer'],
			];
			return [
				'success' => true,
				'data' => $res,
			];
		}
		return ['success' => false];
	}

}