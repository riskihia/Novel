<?php

namespace App\Http\Controllers\Novels;

use App\Http\Controllers\Controller;
use App\Services\NovelService;
use Illuminate\Http\RedirectResponse;
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
            'avatar' => 'image|mimes:jpeg,png|max:1000', // Maksimal 2MB
        ]);
        $judul = $request->input("judul");
        $link = $request->input("link");

        // $extFile = $request->avatar->getClientOriginalExtension();
        // $namaFile = $request->user()->name."-".time().".".$extFile;
        // $path = $request->avatar->storeAs('public',$namaFile);
        // $pathBaru = asset('storage/'.$namaFile);
        $pathBaru = $this->novelService->uploadAvatarAndGetPath($request);

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
        $novel = $this->novelService->getNovelById($id);
        return view('components.novels.edit', compact('novel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'judul' => 'required|string|max:200',
            'link' => 'required',
            'avatar' => 'image|mimes:jpeg,png|max:1000', // Maksimal 2MB
        ]);
    
        $novel = $this->novelService->getNovelById($id);
        $novel->judul = $request->judul;
        $novel->link = $request->link;
    
        // Cek apakah ada gambar avatar yang diunggah
        if ($request->hasFile('avatar')) {
            $deleteAvatar = $this->novelService->deleteAvatarNovel(basename($novel->avatar));
            $pathBaru = $this->novelService->uploadAvatarAndGetPath($request);
            $novel->avatar = $pathBaru;
        }
    
        $novel->save();
    
        return redirect()->route('novels')->with('success', 'Novel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
        $this->novelService->deleteNovel($id);
        return redirect()->route('novels')->with('success', 'Novel berhasil dihapus');
    }
}
