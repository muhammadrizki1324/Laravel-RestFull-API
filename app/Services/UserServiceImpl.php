<?php

namespace App\Services;

use App\Repositories\Interface\UserRepository;
use App\Services\Interface\UserService as InterfaceUserService;

class UserServiceImpl implements InterfaceUserService
{
    protected $userRepo;
    /**
     * Create a new class instance.
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(array $data)
    {
        return $this->userRepo->createUser($data);
    }
}
