<?php

namespace App\Services\Impl;

use App\Models\Request;
use App\Services\RequestService;

class RequestServiceImpl implements RequestService{
    public function getAllRequests()
    {
        return Request::all();
    }
    public function addRequests(string $judul, string $link)
    {
        Request::create([
            'judul' => $judul,
            'link' => $link,
        ]);

        return "berhasil add tags";
    }

    public function deleteRequest(string $id)
    {
        $request = Request::findOrFail($id);

        if (!$request) {
            return redirect()->route('tag')->with('error', 'Request tidak ditemukan');
        }
        $request->delete();
    }
}