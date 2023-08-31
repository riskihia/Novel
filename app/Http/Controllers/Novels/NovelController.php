<?php

namespace App\Http\Controllers\Novels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->view("components.novels.show-novel");
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
            'judul' => 'required|string',
            'link' => 'required',
            'avatar' => 'required|image|mimes:jpeg,png|max:1000', // Maksimal 2MB
        ]);
        $extFile = $request->avatar->getClientOriginalExtension();
        $namaFile = $request->user()->name."-".time().".".$extFile;
        $path = $request->avatar->storeAs('public',$namaFile);
        echo "Proses upload berhasil, file berada di: $path";
        $pathBaru = asset('storage/'.$namaFile);
        echo "Proses upload berhasil, file berada di: <a href='$pathBaru'>
        $pathBaru</a>";
        // echo "eko";
        // dd($request->avatar);
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
