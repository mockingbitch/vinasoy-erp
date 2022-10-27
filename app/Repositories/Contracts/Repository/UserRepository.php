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

    /**
     * @param string $email
     * 
     * @return boolean
     */
    public function checkExistedEmail(string $email) : bool
    {
        $user = $this->model->where('email', $email)->first();

        return $user ? true : false;
    }
}