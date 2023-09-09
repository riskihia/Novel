<?php

namespace App\Http\Controllers;

use App\Services\RequestService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    private RequestService $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function index()
    {
        $requests = $this->requestService->getAllRequests();
        return response()->view("request", compact("requests"));
    }
    //
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(),[
            'judul' => 'required|string|max:200',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $judul = $request->input("judul");
        $link = $request->input("link");

        $this->requestService->addRequests($judul, $link);
        
        return redirect()->route("homepage");
    }
    public function destroy(string $id): RedirectResponse
    {
        //
        $this->requestService->deleteRequest($id);
        return redirect()->route('request')->with('success', 'Request berhasil dihapus');
    }
}
