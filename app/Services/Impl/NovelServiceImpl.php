<?php

namespace App\Services\Impl;

use App\Models\Novel;
use App\Models\Tag;
use App\Services\NovelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NovelServiceImpl implements NovelService{

    public function getNovelByJudul(string $judulNovel){
        return Novel::where("judul", $judulNovel)->first();
    }
    public function getAllNovel(){
        return Novel::orderBy('created_at', 'desc')->paginate(10);
    }

    public function getNovelById(string $id)
    {
        return Novel::findOrFail($id);
    }

    public function addNovel(string $avatar, string $judul, string $link,string $sinopsis, string $author_name, string $status, array $tags){
        
        // dd($tagsString);

        Novel::create([
            'avatar' => $avatar,
            'judul' => $judul,
            'link' => $link,
            'sinopsis' => $sinopsis,
            'status' => $status,
            'author_name' => $author_name,
        ]);
        $novel = Novel::where("judul", $judul)->first();
        
        $tagIds = [];
        foreach ($tags as $tagName) {
            $tag = Tag::where("nama", $tagName)->first();
            if ($tag) {
                $tagIds[] = $tag->id;
            }
        }

        $novel->tags()->attach($tagIds);
        

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

    public function deleteAvatarNovel(string $namaFile)
    {
        // $namaFile = basename($namaFile);
        $isImageExist = Storage::disk('public')->exists($namaFile);

        if ($isImageExist) {
            Storage::disk('public')->delete($namaFile);
        }
    }

    public function deleteNovel(string $id){
        $novel = Novel::findOrFail($id);

        if (!$novel) {
            return redirect()->route('novels')->with('error', 'Novel tidak ditemukan');
        }
        
        $this->deleteAvatarNovel(basename($novel->avatar));

        $novel->delete();
    }

    
}