<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class ImageUploadService
{
    protected $disk = 'public';
    protected $maxWidth = 1200;
    protected $maxHeight = 1200;
    protected $quality = 85;

    /**
     * Upload and process an image
     */
    public function uploadImage(UploadedFile $file, string $path = 'images'): string
    {
        // Generate unique filename
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $fullPath = $path . '/' . $filename;

        // Get image content
        $imageContent = file_get_contents($file->getRealPath());

        // Process and resize image if needed
        if (extension_loaded('gd') || extension_loaded('imagick')) {
            try {
                $image = Image::make($imageContent);
                
                // Resize if larger than max dimensions
                if ($image->width() > $this->maxWidth || $image->height() > $this->maxHeight) {
                    $image->resize($this->maxWidth, $this->maxHeight, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }

                // Encode with quality setting
                $imageContent = $image->encode($file->getClientOriginalExtension(), $this->quality)->encoded;
            } catch (\Exception $e) {
                // If image processing fails, use original file
                $imageContent = file_get_contents($file->getRealPath());
            }
        }

        // Store the image
        Storage::disk($this->disk)->put($fullPath, $imageContent);

        return $fullPath;
    }

    /**
     * Upload image as base64 (for API usage)
     */
    public function uploadImageAsBase64(UploadedFile $file, string $path = 'images'): string
    {
        $imageContent = file_get_contents($file->getRealPath());
        $mimeType = $file->getMimeType();
        
        // Process and resize image if needed
        if (extension_loaded('gd') || extension_loaded('imagick')) {
            try {
                $image = Image::make($imageContent);
                
                // Resize if larger than max dimensions
                if ($image->width() > $this->maxWidth || $image->height() > $this->maxHeight) {
                    $image->resize($this->maxWidth, $this->maxHeight, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                }

                // Encode with quality setting
                $imageContent = $image->encode($file->getClientOriginalExtension(), $this->quality)->encoded;
            } catch (\Exception $e) {
                // If image processing fails, use original file
                $imageContent = file_get_contents($file->getRealPath());
            }
        }

        return 'data:' . $mimeType . ';base64,' . base64_encode($imageContent);
    }

    /**
     * Delete an image
     */
    public function deleteImage(string $path): bool
    {
        if (Storage::disk($this->disk)->exists($path)) {
            return Storage::disk($this->disk)->delete($path);
        }
        
        return false;
    }

    /**
     * Get image URL
     */
    public function getImageUrl(string $path): string
    {
        return Storage::disk($this->disk)->url($path);
    }

    /**
     * Upload multiple images
     */
    public function uploadMultipleImages(array $files, string $path = 'images'): array
    {
        $uploadedFiles = [];
        
        foreach ($files as $file) {
            if ($file instanceof UploadedFile) {
                $uploadedFiles[] = $this->uploadImage($file, $path);
            }
        }
        
        return $uploadedFiles;
    }

    /**
     * Validate image file
     */
    public function validateImage(UploadedFile $file): bool
    {
        $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $maxSize = 5 * 1024 * 1024; // 5MB

        return in_array($file->getMimeType(), $allowedMimes) && $file->getSize() <= $maxSize;
    }

    /**
     * Create thumbnail
     */
    public function createThumbnail(string $imagePath, int $width = 300, int $height = 300): string
    {
        if (!Storage::disk($this->disk)->exists($imagePath)) {
            throw new \Exception('Image not found');
        }

        $imageContent = Storage::disk($this->disk)->get($imagePath);
        $pathInfo = pathinfo($imagePath);
        $thumbnailPath = $pathInfo['dirname'] . '/thumb_' . $pathInfo['basename'];

        try {
            $image = Image::make($imageContent);
            $image->fit($width, $height);
            $thumbnailContent = $image->encode($pathInfo['extension'], $this->quality)->encoded;
            
            Storage::disk($this->disk)->put($thumbnailPath, $thumbnailContent);
            
            return $thumbnailPath;
        } catch (\Exception $e) {
            throw new \Exception('Failed to create thumbnail: ' . $e->getMessage());
        }
    }
}