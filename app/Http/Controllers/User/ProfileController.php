<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdatePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Services\Interface\UserService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function profile()
    {
        return response()->json([
            "status" => "success",
            "data" => $this->userService->getCurrentUser()
        ], 200);
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->updateCurrentUser($data);
        return response()->json([
            "status" => "success",
            "data" => $user
        ]);
    }

    public function changePassword(UserUpdatePasswordRequest $request)
    {
        $data = $request->validated();
        $user = $this->userService->updatePassword($data);
        return response()->json([
            "status" => "success",
            "message" => "success change passowrd " . $user->name
        ]);
    }
}
