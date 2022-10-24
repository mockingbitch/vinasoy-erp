<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\User;
use App\Repositories\Contracts\Interface\UserRepositoryInterface;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
}