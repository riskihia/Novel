<?php

namespace App\Services;

interface RequestService{
    public function getAllRequests();
    public function deleteRequest(string $id);
    public function addRequests(string $judul,string $link);
}