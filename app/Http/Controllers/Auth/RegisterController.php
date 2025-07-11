<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Interface\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserRegisterRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->register($data);

        return response()->json([
            "status" => "success",
            "message" => "user registred",
            "data" => $user,
        ], 201);
    }
}
