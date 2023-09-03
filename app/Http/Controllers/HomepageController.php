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
        $searchQuery = $request->input('searchQuery');

        $novels = Novel::where('judul', 'like', "%$searchQuery%")
            ->take(5) // Limit the results to 5
            ->get();

        return response()->json(['novels' => $novels]);
    }
    public function cari(Request $request)
    {
        $searchQuery = $request->query('cari-novel');
        $novels = Novel::where('judul', 'like', "%$searchQuery%")->paginate(10);
        // Your code to perform the search with $searchQuery here

        return view('homepage', [
            "novels" => $novels,
            'searchQuery' => $searchQuery,
            // Other data you want to pass to the view
        ]);
    }
    //
    public function index(){
        $novels = $this->novelService->getAllNovel();
        return response()->view("homepage",[
            "novels" => $novels 
        ]);
    }
}
