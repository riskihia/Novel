<?php

namespace App\Http\Middleware;

use App\Models\Novel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureJudulNovelUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Periksa apakah pengguna adalah admin
        // Mendapatkan path URL saat ini
        $currentPath = str_replace("%20", " ", $request->path());
        $novel = Novel::where("judul", $currentPath)->first();
        
        if ($novel) {
            return $next($request);
        }
        dd($currentPath);
        // Jika bukan admin, arahkan ke halaman lain (misalnya, beranda)
        return redirect('/');
    }
}
