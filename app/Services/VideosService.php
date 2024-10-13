<?php

namespace App\Services;

use App\Repositories\VideosRepository;
use App\Models\Video;
use App\Traits\FilesHandlers;

class VideosService extends VideosRepository
{
    use FilesHandlers;

    public function __construct(Video $model)
    {
        parent::__construct($model, [], []);
    }

    public function create($payload)
    {
        $payload['video_src'] = $this->upload('/videos', $payload['video_file']);
        $payload['thumbnail_src'] = $this->upload('/videos', $payload['thumbnail_file']);

        unset($payload['video_file']);
        unset($payload['thumbnail_file']);

        return parent::create($payload);
    }
}
