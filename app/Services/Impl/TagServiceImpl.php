<?php

namespace App\Services\Impl;

use App\Models\Tag;
use App\Services\TagService;

class TagServiceImpl implements TagService{
    public function getAllTags()
    {
        return Tag::orderBy('nama', 'asc')->get();
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
}