<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Services\NovelService;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    private NovelService $novelService;

    public function __construct(NovelService $novelService)
    {
        $this->novelService = $novelService;
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('cari-novel');

        $novels = Novel::where('judul', 'like', "%$searchQuery%")->paginate(10);


        return response()->view("homepage",[
            "novels" => $novels,
            "searchQuery" => $searchQuery
        ]);
        // return view('show-novel', compact('novels', 'searchQuery'));
    }
    //
    public function index(){
        $novels = $this->novelService->getAllNovel();
        return response()->view("homepage",[
            "novels" => $novels 
        ]);
    }
}
