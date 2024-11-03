<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class BaseApiController extends Controller
{
    protected $service;

    public function index()
    {
        return $this->makeResponse($this->service->all());
    }

    public function store(Request $request)
    {
        return $this->makeResponse($this->service->create($request->all()));
    }

    public function show($id)
    {
        return $this->makeResponse($this->service->find($id));
    }

    public function update(Request $request, $id)
    {
        return $this->makeResponse($this->service->update($id, $request->all()));
    }

    public function destroy($id)
    {
        return $this->makeResponse($this->service->delete($id));
    }

    public function makeResponse($message = 'Successfully', $status = 200, $data = [], $fields = []): JsonResponse
    {
        $res = [];
        if (!empty($data) || sizeof($data) !== 0)
            $res['data'] = $data;

        if (!empty($message))
            $res['message'] = $message;

        $res['status_code'] = $status;
        $res = [...$res, ...$fields];
        return response()->json($res);
    }
}