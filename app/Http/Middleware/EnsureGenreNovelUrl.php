<?php

namespace App\Http\Middleware;

use App\Models\Tag;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureGenreNovelUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentPath = str_replace("%20", " ", $request->path());
        $parts = explode('/', $currentPath);
        $lastPart = end($parts);
        $tag = Tag::where("nama", $lastPart)->first();
        
        if ($tag) {
            return $next($request);
        }
        // Jika bukan admin, arahkan ke halaman lain (misalnya, beranda)
        return redirect('/kategori');
    }
}
