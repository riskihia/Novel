<?php

namespace App\Http\Controllers\Novels;

use App\Http\Controllers\Controller;
use App\Models\Novel;
use App\Models\User;
use App\Services\NovelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    private NovelService $novelService;

    public function __construct(NovelService $novelService)
    {
        $this->novelService = $novelService;
    }
    //
    public function index()
    {
        $user = User::where("id", Auth::id())->first();
        if($user){
            $novels = $user->novels()->paginate(10);
            return response()->view("libraryNovel",compact("novels"));
        }
        return response()->view("libraryNovel");

    }

    public function addToLibrary(Request $request)
    {
        $userLogin = Auth::user();
        $judulNovel = $request->input("judulNovel");

        $user = User::where("name", $userLogin->name)->first();
        $novel = Novel::where("judul", $judulNovel)->first();

        // dd($user->novel());
        $user->novels()->syncWithoutDetaching($novel);

        return redirect()->back();
    }
    public function deleteFromLibrary(Request $request)
    {
        $userLogin = Auth::user();
        $judulNovel = $request->input("judulNovel");

        $user = User::where("name", $userLogin->name)->first();
        $novel = Novel::where("judul", $judulNovel)->first();

        // dd($user->novel());
        $user->novels()->detach($novel);

        return redirect()->back();
    }
}
