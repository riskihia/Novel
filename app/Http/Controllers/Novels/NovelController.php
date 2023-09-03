<?php

namespace App\Http\Controllers\Novels;

use App\Http\Controllers\Controller;
use App\Services\NovelService;
use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NovelController extends Controller
{
    private NovelService $novelService;
    private TagService $tagService;

    public function __construct(NovelService $novelService, TagService $tagService)
    {
        $this->novelService = $novelService;
        $this->tagService = $tagService;
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
        
        $tags = $this->tagService->getAllTags();
        return response()->view("components.novels.add-novel", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'judul' => 'required|string|max:200',
            'link' => 'required',
            'avatar' => 'image|mimes:jpeg,png|max:1000', 
            'tags' => [
                'nullable',
                'string',
                'regex:/^(#(\w+)(\s+#\w+){0,9})?$/i', // Hanya menerima maksimal 10 tag yang diawali dengan #
                'max:100', // Maksimal 100 karakter
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $judul = $request->input("judul");
        $link = $request->input("link");
        $tags = $request->input("tags");
        // dd($tags);

        $pathBaru = $this->novelService->uploadAvatarAndGetPath($request);

        $this->novelService->addNovel($pathBaru, $judul, $link, $tags);

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
