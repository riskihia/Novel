<?php

namespace App\Http\Controllers\novels;

use App\Http\Controllers\Controller;
use App\Models\Novel;
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
        $status = $this->novelService->getAllNovelStatus();
        // dd($status);

        return response()->view("kategoriNovel",compact("tags", "authors", "status"));
    }

    public function cariGenre(Request $request, string $genre){
        $tag = Tag::where("nama", $genre)->first();

        $novels = $tag->novels()->paginate(10); // atau paginate() jika ingin menggunakan paginasi

        return response()->view("genreView", compact("novels", "genre"));
    }
    public function cariAuthor(Request $request, string $author){
        $novels = Novel::where("author_name", $author)->paginate(10);

        return response()->view("authorView", compact("novels", "author"));
    }
    public function cariStatus(Request $request, string $status){
        $novels = Novel::where("status", $status)->paginate(10);

        return response()->view("statusView", compact("novels", "status"));
    }
}
