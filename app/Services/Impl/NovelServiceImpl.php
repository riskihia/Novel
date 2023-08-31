<?php

namespace App\Services\Impl;

use App\Models\Novel;
use App\Services\NovelService;

class NovelServiceImpl implements NovelService{

    public function getAllNovel(){
        return Novel::all();
    }

    public function addNovel(string $avatar, string $judul, string $link){
        Novel::create([
            'avatar' => $avatar,
            'judul' => $judul,
            'link' => $link,
        ]);
        return "berhasil add novel";
    }
}