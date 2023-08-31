<?php

namespace App\Services;

interface NovelService{
    public function getAllNovel();
    public function addNovel(string $avatar, string $judul, string $link);
}