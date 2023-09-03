<?php

namespace App\Services;

interface TagService{
    public function getAllTags();
    public function getIdTags(array $tags);
}