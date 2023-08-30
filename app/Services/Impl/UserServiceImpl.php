<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;

class UserServiceImpl implements UserService{
    public function getAllUser()
    {
        return User::all();
    }
}