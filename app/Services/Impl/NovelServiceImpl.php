<?php

namespace App\Services\Impl;

use App\Models\Novel;
use App\Services\NovelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NovelServiceImpl implements NovelService{

    public function getAllNovel(){
        return Novel::paginate(10);
    }

    public function addNovel(string $avatar, string $judul, string $link){
        Novel::create([
            'avatar' => $avatar,
            'judul' => $judul,
            'link' => $link,
        ]);
        return "berhasil add novel";
    }

    public function uploadAvatarAndGetPath(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png|max:1000', // Maksimal 2MB
        ]);

        $extFile = $request->avatar->getClientOriginalExtension();
        $namaFile = $request->user()->name . "-" . time() . "." . $extFile;
        // $path = $request->avatar->move('storage', $namaFile);
        $path = $request->avatar->storeAs('public', $namaFile);
        $pathBaru = asset('storage/' . $namaFile);

        return $pathBaru;
    }

    public function deleteNovel(string $id){
        $novel = Novel::findOrFail($id);

        if (!$novel) {
            return redirect()->route('novels')->with('error', 'Novel tidak ditemukan');
        }
        $namaFile = basename($novel->avatar);
        $isImageExist = Storage::disk('public')->exists($namaFile);

        // Hapus gambar avatar jika ada
        if ($isImageExist) {
            Storage::disk('public')->delete($namaFile);
        }

        $novel->delete();
    }

    
}