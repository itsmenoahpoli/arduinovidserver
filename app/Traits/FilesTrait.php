<?php

namespace App\Traits;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Storage;

trait FilesHandlers
{
    public function upload($path, $file)
    {
        try
        {
            $uploadPath = Storage::putFile($path, $file, 'public');
            return config('app.url').'/'.Storage::url($uploadPath);
        } catch (\Exception $exception)
        {
            throw new HttpException(500, $exception->getMessage());
        }
    }
}
