<?php

namespace App\Helpers;

use CodeIgniter\HTTP\Files\UploadedFile;
use RuntimeException;

class FileUploadService
{
    public function upload(UploadedFile $file, string $directory): string
    {
        $uploadPath = FCPATH . "uploads/{$directory}/";

        // Create directory if it doesn't exist
        if (!is_dir($uploadPath) && !mkdir($uploadPath, 0777, true) && !is_dir($uploadPath)) {
            throw new RuntimeException(sprintf('Failed to create directory: %s', $uploadPath));
        }

        $newName = $file->getRandomName();

        try {
            $file->move($uploadPath, $newName);
        } catch (\Exception $e) {
            throw new RuntimeException('File upload failed: ' . $e->getMessage());
        }

        return "uploads/{$directory}/{$newName}";
    }
}