<?php

namespace App\Services\Impl;

use App\Models\Tag;
use App\Services\TagService;

class TagServiceImpl implements TagService{
    public function getAllTags()
    {
        return Tag::orderBy('created_at', 'desc');
    }
}