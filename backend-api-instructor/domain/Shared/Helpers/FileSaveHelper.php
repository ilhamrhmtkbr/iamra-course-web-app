<?php

namespace Domain\Shared\Helpers;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileSaveHelper
{
    const PRIVATE = 'local';
    const PUBLIC = 'public';

    public static function to(string $type, string $path, File|UploadedFile $file): void
    {
        $storage = Storage::disk($type);

        if ($storage->exists($path))
        {
            $storage->delete($path);
        }

        $storage->put($path, $file);
    }
}
