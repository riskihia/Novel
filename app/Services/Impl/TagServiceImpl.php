<?php

namespace App\Services\Impl;

use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Database\QueryException;

class TagServiceImpl implements TagService{
    public function getAllTags()
    {
        return Tag::orderBy('nama', 'asc')->get();
    }
    
    public function addTags(string $nama)
    {
        Tag::create([
            'nama' => $nama,
        ]);

        return "berhasil add tags";
    }

    public function getIdTags(array $tags)
    {
        $tagIds = [];
        foreach ($tags as $tagName) {
            $tag = Tag::where("nama", $tagName)->first();
            if ($tag) {
                $tagIds[] = $tag->id;
            }
        }

        return $tagIds;
    }

    public function deleteTag(string $id)
    {
        try {
            $tag = Tag::findOrFail($id);
            $tag->delete();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus tag karena terdapat ketergantungan data.');
        }
    
        // Redirect ke halaman yang sesuai setelah berhasil menghapus tag
        // return redirect()->route('tag')->with('success', 'Tag berhasil dihapus');
        // $tag = Tag::findOrFail($id);

        // if (!$tag) {
        //     return redirect()->route('tag')->with('error', 'Tag tidak ditemukan');
        // }
        // $delete = $tag->delete();
    }
}