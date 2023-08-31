<?php

namespace App\Http\Controllers;

use App\Services\NovelService;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    private NovelService $novelService;

    public function __construct(NovelService $novelService)
    {
        $this->novelService = $novelService;
    }
    //
    public function index(){
        $novels = $this->novelService->getAllNovel();
        return response()->view("homepage",[
            "novels" => $novels 
        ]);
    }
}
