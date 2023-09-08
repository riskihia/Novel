<?php

namespace App\Services\Impl;

use App\Models\Tag;
use App\Services\TagService;

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
        $tag = Tag::findOrFail($id);

        if (!$tag) {
            return redirect()->route('tag')->with('error', 'Tag tidak ditemukan');
        }
        $tag->delete();
    }
}