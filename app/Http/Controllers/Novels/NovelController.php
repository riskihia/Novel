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
