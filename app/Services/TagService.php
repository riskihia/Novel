<?php

namespace App\Services;

interface TagService{
    public function getAllTags();
    public function addTags(string $nama);
    public function deleteTag(string $id);
    public function getIdTags(array $tags);
}