<?php

namespace App\Services;

use App\Repositories\VideosRepository;
use App\Models\Video;

class VideosService extends VideosRepository
{
    public function __construct(Video $model)
    {
        parent::__construct($model, [], []);
    }
}
