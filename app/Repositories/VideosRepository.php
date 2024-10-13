<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VideosRepository extends BaseRepository
{
    public function __construct(Model $model, array $relationships, array $relationshipsInList)
    {
        parent::__construct($model, $relationships, $relationshipsInList);
    }

    public function create($payload)
    {
        $payload['uid'] = strtoupper(Str::random(15));

        return parent::create($payload);
    }
}
