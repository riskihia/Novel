<?php

namespace App\Services;

interface UserService{
    public function getAllUser();
    public function deleteMember(string $id);
}