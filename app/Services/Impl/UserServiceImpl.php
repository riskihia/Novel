<?php

namespace App\Services\Impl;

use App\Models\User;
use App\Services\UserService;

class UserServiceImpl implements UserService{
    public function getAllUser()
    {
        return User::all();
    }

    public function deleteMember(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return redirect()->route('member')->with('error', 'Member tidak ditemukan');
        }
        $user->delete();
    }
}