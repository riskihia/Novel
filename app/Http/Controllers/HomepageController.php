<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use App\Services\NovelService;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\RedirectResponse;
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
            ->take(10) // Limit the results to 5
            ->get();

        return response()->json(['novels' => $novels]);
    }
    public function cari(Request $request)
    {
        $searchQuery = $request->input('cari-novel');
        
        return redirect()->route('homepage', ['cari-novel' => $searchQuery]);
    }
    //
    public function index(Request $request){
        $searchQuery = $request->input('cari-novel');

        if ($searchQuery) {
            // Lakukan pencarian jika ada parameter query
            $novels = Novel::where('judul', 'like', "%$searchQuery%")->paginate(10);
        } else {
            // Jika tidak ada parameter query, ambil semua novel
            $novels = $this->novelService->getAllNovel();
        }
        return view("homepage", [
            "novels" => $novels,
            "searchQuery" => $searchQuery
        ]);

    }
}
