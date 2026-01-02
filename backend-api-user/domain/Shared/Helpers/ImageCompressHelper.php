<?php

namespace Domain\Shared\Helpers;

use Symfony\Component\HttpFoundation\Response;

class ImageCompressHelper
{
    public static function doIt(string $imageName, string $base64Image, string $path = 'user-images'): \Illuminate\Http\JsonResponse|string
    {
        $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Image));
        $image = imagecreatefromstring($imageData);

        if ($image === false) {
            return ResponseApiHelper::send('Failed to create GD image from base64 data.', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $compressedImageName = $imageName . '.webp';

        // Get original dimensions
        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);

        // Set maximum dimensions
        $maxWidth = 175;
        $maxHeight = 175;

        // Calculate new dimensions
        $newWidth = $originalWidth;
        $newHeight = $originalHeight;

        // Only resize if image is larger than maximum dimensions
        if ($originalWidth > $maxWidth || $originalHeight > $maxHeight) {
            // Calculate scaling ratios
            $widthRatio = $maxWidth / $originalWidth;
            $heightRatio = $maxHeight / $originalHeight;

            // Use the smaller ratio to maintain aspect ratio
            $ratio = min($widthRatio, $heightRatio);

            $newWidth = (int)($originalWidth * $ratio);
            $newHeight = (int)($originalHeight * $ratio);
        }

        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);

        $success = imagewebp($resizedImage, storage_path('app/public/' . $path . '/' . $compressedImageName), 80); // WebP quality (0-100)

        imagedestroy($image);
        imagedestroy($resizedImage);

        if (!$success) {
            return ResponseApiHelper::send('Failed to save the compressed image.', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $path . '/' . $compressedImageName;
    }
}
