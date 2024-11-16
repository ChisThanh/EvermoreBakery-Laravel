<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class BaseApiController extends Controller
{
    protected $service;

    public function index(): JsonResponse
    {
        return $this->makeResponse(data: $this->service->all());
    }

    public function store(Request $request): JsonResponse
    {
        return $this->makeResponse(data: $this->service->create($request->all()));
    }

    public function show($id): JsonResponse
    {
        return $this->makeResponse(data: $this->service->find($id));
    }

    public function update(Request $request, $id): JsonResponse
    {
        return $this->makeResponse(data: $this->service->update($id, $request->all()));
    }

    public function destroy($id): JsonResponse
    {
        return $this->makeResponse(data: $this->service->delete($id));
    }

    public function makeResponse($message = 'Successfully', $status = 200, $data = [], $fields = []): JsonResponse
    {
        $res = [];
        if ($data !== null && $data !== '' && !(is_array($data) && empty($data)))
            $res['data'] = $data;

        if (!empty($message))
            $res['message'] = $message;

        $res['status_code'] = $status;
        $res = [...$res, ...$fields];
        return response()->json($res);
    }
}