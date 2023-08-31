<?php

namespace App\Http\Controllers\Novels;

use App\Http\Controllers\Controller;
use App\Services\NovelService;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    private NovelService $novelService;

    public function __construct(NovelService $novelService)
    {
        $this->novelService = $novelService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $novels = $this->novelService->getAllNovel();
        return response()->view("components.novels.show-novel",[
            "novels" => $novels 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return response()->view("components.novels.add-novel");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'judul' => 'required|string|max:200',
            'link' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png|max:1000', // Maksimal 2MB
        ]);
        $judul = $request->input("judul");
        $avatar = $request->input("avatar");
        $link = $request->input("link");

        $extFile = $request->avatar->getClientOriginalExtension();
        $namaFile = $request->user()->name."-".time().".".$extFile;
        $path = $request->avatar->storeAs('public',$namaFile);
        $pathBaru = asset('storage/'.$namaFile);

        $this->novelService->addNovel($pathBaru, $judul, $link);

        return redirect()->route("novels");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}