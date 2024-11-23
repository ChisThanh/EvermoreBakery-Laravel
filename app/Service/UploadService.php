<?php

namespace App\Service;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
    public function uploadFile($file, $storePath = 'uploads')
    {
        $originalName = Str::slug(pathinfo(
            $file->getClientOriginalName(),
            PATHINFO_FILENAME
        ));
        $extension = $file->getClientOriginalExtension();
        $timestamp = date('Y-m-d-H-i-s');
        $newFileName = $originalName . '_' . $timestamp . '.' . $extension;

        try {
            $path = $file->storeAs($storePath, $newFileName);
            return ['success' => true, 'message' => 'File uploaded successfully', 'path' => $path];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'File upload failed: ' . $e->getMessage()];
        }
    }

    public function uploadFiles($files, $storePath = 'uploads')
    {
        $successPaths = [];
        $failedFiles = [];

        foreach ($files as $file) {
            $uploadResult = $this->uploadFile($file, $storePath);

            if ($uploadResult['success']) {
                $successPaths[] = $uploadResult['path'];
            } else {
                $failedFiles[] = $file->getClientOriginalName();
            }
        }

        return [
            'success' => empty($failedFiles),
            'message' => empty($failedFiles)
                ? 'All files uploaded successfully'
                : 'Some files failed to upload.',
            'paths' => $successPaths,
            'failed' => $failedFiles,
        ];
    }


    public function deleteFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
            return ['success' => true, 'message' => 'File deleted successfully'];
        }
        return ['success' => false, 'message' => 'File not found'];
    }

    public function deleteFiles($paths)
    {
        $successPaths = [];
        $failedPaths = [];

        foreach ($paths as $path) {
            $deleteResult = $this->deleteFile($path);
            if ($deleteResult['success']) {
                $successPaths[] = $path;
            } else {
                $failedPaths[] = $path;
            }
        }

        return [
            'success' => empty($failedPaths),
            'message' => empty($failedPaths)
                ? 'All files deleted successfully'
                : 'Some files failed to delete.',
            'deleted' => $successPaths,
            'failed' => $failedPaths,
        ];
    }

}
