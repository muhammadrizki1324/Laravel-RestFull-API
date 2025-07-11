<?php

namespace App\Services\Interface;

interface UserService
{
    public function register(array $data);
    public function login(array $data);
}
