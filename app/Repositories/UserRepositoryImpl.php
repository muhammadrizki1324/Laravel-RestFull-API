<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    public function createUser(array $data)
    {
        return User::create($data);
    }
}
