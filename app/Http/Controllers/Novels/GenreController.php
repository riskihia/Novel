<?php

namespace App\Http\Controllers\novels;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\NovelService;
use App\Services\TagService;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    private NovelService $novelService;
    private TagService $tagService;

    public function __construct(NovelService $novelService, TagService $tagService)
    {
        $this->novelService = $novelService;
        $this->tagService = $tagService;
    }
    //
    public function index(Request $request)
    {
        $tags = $this->tagService->getAllTags();
        $authors = $this->novelService->getAllNovelAuthor();
        return response()->view("kategoriNovel",compact("tags", "authors"));
    }

    public function cariGenre(Request $request, string $genre){
        $tag = Tag::where("nama", $genre)->first();

        $novels = $tag->novels()->paginate(10); // atau paginate() jika ingin menggunakan paginasi

        return response()->view("genreView", compact("novels", "genre"));
    }
}
