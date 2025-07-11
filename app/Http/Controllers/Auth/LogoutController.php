<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Interface\UserService;

class LogoutController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $this->userService->logout();

        return response()->json([
            "status" => "success",
            "message" => 'User logged out successfully',
        ], 200);
    }
}
