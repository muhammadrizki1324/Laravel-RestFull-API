<?php

namespace App\Services\Interface;

interface UserService
{
    public function register(array $data);
    public function login(array $data);
    public function logout();
    public function getCurrentUser();
    public function updateCurrentUser(array $data);
    public function updatePassword(array $data);
}
