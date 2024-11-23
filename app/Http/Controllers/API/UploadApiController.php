<?php

namespace App\Http\Controllers\API;

use App\Service\UploadService;
use Illuminate\Http\Request;

class UploadApiController extends BaseApiController
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        $res = $this->uploadService->uploadFile($file);
        if ($res['success'] === false)
            return $this->makeResponse($res['message'], 400);
        return $this->makeResponse($res['message'], 200, $res['path']);
    }

    public function uploadFiles(Request $request)
    {
        $files = $request->file('files');
        $res = $this->uploadService->uploadFiles($files);
        if ($res['success'] === false)
            return $this->makeResponse($res['message'], 400);
        return $this->makeResponse($res['message'], 200, $res['paths']);
    }

    public function deleteFile(Request $request)
    {
        $path = $request->input('path');
        $res = $this->uploadService->deleteFile($path);
        if ($res['success'] === false)
            return $this->makeResponse($res['message'], 400);
        return $this->makeResponse($res['message'], 200);
    }

    public function deleteFiles(Request $request)
    {
        $paths = $request->input('paths');
        $res = $this->uploadService->deleteFiles($paths);
        return $this->makeResponse($res['message'], 200);
    }
}