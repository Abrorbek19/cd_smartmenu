<?php

namespace App\Services;

class FileUploadService
{
    public function upload($file, $directory): string
    {
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path($directory), $fileName);
        return $fileName;
    }

    public function delete($fileName, $directory): bool
    {
        $filePath = public_path($directory . '/' . trim($fileName));

        if (file_exists($filePath)) {
            if (unlink($filePath)) {
                return true;
            } else {
                \Log::error("Failed to delete file.");
            }
        } else {
            \Log::error("File does not exist.");
        }

        return false;
    }
}
