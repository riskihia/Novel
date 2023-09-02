<?php

namespace App\Services;

use Illuminate\Http\Request;

interface NovelService{
    public function getAllNovel();
    public function deleteAvatarNovel(string $namaFile);
    public function getNovelById(string $id);
    public function addNovel(string $avatar, string $judul, string $link);
    public function uploadAvatarAndGetPath(Request $request);
    public function deleteNovel(string $id);
}