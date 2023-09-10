<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->email)->first();

        if($user){
            Auth::login($user);
            return redirect()->route("homepage");
        }

        
        $user = User::create([
            'name' => $googleUser->name,
            "email" => $googleUser->email,
            'google_id' => $googleUser->id,
            "password" => env("DEFAULT_PASSWORD")
        ]);
        // Cari pengguna berdasarkan google_id
        // $user = User::firstOrCreate([
        //     'email' => $googleUser->email,
        // ], [
        //     'name' => $googleUser->name,
        //     'google_id' => $googleUser->id,
        //     "password" => env("DEFAULT-PASSWORD")
        // ]);
    
        
        // Autentikasi pengguna
        Auth::login($user);
    
        return redirect()->route("homepage");
        // Redirect atau tindakan lainnya setelah berhasil login
        // Handle user login or registration here
    }
}
