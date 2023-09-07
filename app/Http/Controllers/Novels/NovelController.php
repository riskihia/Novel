<?php

namespace App\Http\Controllers\Novels;

use App\Http\Controllers\Controller;
use App\Models\Novel;
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

    
    public function cariListNovel(Request $request)
    {
        $searchQuery = $request->input('cari-novel');
        
        
        return redirect()->route('listNovel', ['cari-novel' => $searchQuery]);
    }
    public function listNovel(Request $request)
    {
        $searchQuery = $request->input('cari-novel');
        if ($searchQuery) {
            // Lakukan pencarian jika ada parameter query
            $novels = Novel::where('judul', 'like', "%$searchQuery%")->paginate(10);
        } else {
            // Jika tidak ada parameter query, ambil semua novel
            $novels = $this->novelService->getAllNovel();
        }
        // $novels = $this->novelService->getAllNovel();
        return response()->view('listNovel', compact('novels'));
    }
    public function viewNovel(Request $request, string $judulNovel)
    {
        // dd($judulNovel);
        $novel = $this->novelService->getNovelByJudul($judulNovel);
        return response()->view('viewNovel', compact('novel'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('cari-novel');

        $novels = Novel::where('judul', 'like', "%$searchQuery%")->paginate(10);


        return response()->view("components.novels.show-novel",[
            "novels" => $novels,
            "searchQuery" => $searchQuery
        ]);
        // return view('show-novel', compact('novels', 'searchQuery'));
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
            'sinopsis' => 'required|string|max:500', // Validasi untuk sinopsis
            'status' => 'required|in:completed,hiatus,ongoing', // Validasi untuk status
            'author' => 'required|string',
            "tags" => 'required|array'
        ]);
        
        // dd($request->input());

        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $judul = $request->input("judul");
        $link = $request->input("link");
        $tags = $request->input("tags");
        $sinopsis = $request->input("sinopsis"); // Ambil sinopsis dari request
        $status = $request->input("status"); // Ambil status dari request
        $authorName = $request->input("author"); // Ambil author_name dari request

        // dd($tags);

        $pathBaru = $this->novelService->uploadAvatarAndGetPath($request);

        $this->novelService->addNovel($pathBaru, $judul, $link,$sinopsis,  $authorName,$status, $tags);

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
        $allTags = $this->tagService->getAllTags(); // Ambil semua tag
        $selectedTags = $novel->tags()->pluck('nama')->toArray(); // Ambil tag yang terkait dengan novel
        // dd($selectedTags);
        return view('components.novels.edit', compact('novel', 'allTags', 'selectedTags'));
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
            'tags' => 'required|array',
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
        $tags = $request->input('tags');

        $tagIds = $this->tagService->getIdTags($tags);
        $novel->tags()->sync($tagIds);
    
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
