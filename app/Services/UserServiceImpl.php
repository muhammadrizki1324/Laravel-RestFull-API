<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;
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

    public function login(array $data)
    {
        $user = $this->userRepo->findByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new AuthenticationException("Email or password wrong");
        }

        $token = $user->createToken('API_TOKEN');
        $token->accessToken->expires_at = now()->addMinutes(15);
        $token->accessToken->save();

        return [
            "token" => $token->plainTextToken,
            "expiration" => $token->accessToken->expires_at->toDateTimeString(),
            "token_type" => "Bearer"
        ];
    }
}
