<?php

namespace App\Services;

use Illuminate\Http\Request;

interface NovelService{
    public function getAllNovel();
    public function getAllNovelAuthor();
    public function getNovelByJudul(string $judulNovel);
    public function deleteAvatarNovel(string $namaFile);
    public function getNovelById(string $id);
    public function addNovel(string $avatar, string $judul, string $link,string $sinopsis, string $author_name, string $status, array $tags);
    public function uploadAvatarAndGetPath(Request $request);
    public function deleteNovel(string $id);
}