<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsersRepository extends BaseRepository
{
    public function __construct(Model $model, array $relationships, array $relationshipsInList)
    {
        parent::__construct($model, $relationships, $relationshipsInList);
    }

    public function create($payload)
    {
        $payload['password'] = Hash::make($payload['password']);

        return parent::create($payload);
    }
}
