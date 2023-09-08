<?php

namespace App\Http\Middleware;

use App\Models\Novel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAuthorNovelUrl
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
        $novel_author = Novel::where("author_name", $lastPart)->first();
        
        if ($novel_author) {
            return $next($request);
        }
        return redirect('/kategori');
    }
}
