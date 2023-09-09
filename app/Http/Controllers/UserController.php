<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return response()->view("member", [
            "users" => $this->userService->getAllUser()
        ]);
    }

    public function destroy(string $id): RedirectResponse
    {
        //
        $this->userService->deleteMember($id);
        return redirect()->route('member')->with('success', 'Member berhasil dihapus');
    }
}
