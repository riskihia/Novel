<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    private TagService $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    //
    public function index()
    {
        $tags = $this->tagService->getAllTags();
        return response()->view("tag", compact("tags"));
    }

    public function create()
    {
        return response()->view("components.novels.add-tag");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'namaTag' => 'required|string|max:200',
        ]);
        
        // dd($request->input());
        $namaTag = $request->input("namaTag");
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->tagService->addTags($namaTag);
        return redirect()->route("tag");
    }

    public function destroy(string $id): RedirectResponse
    {
        //
        $this->tagService->deleteTag($id);
        return redirect()->route('tag')->with('success', 'Tag berhasil dihapus');
    }
}
