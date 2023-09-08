<?php

namespace App\Http\Middleware;

use App\Models\Novel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStatusNovelUrl
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
        $novel_status = Novel::where("status", $lastPart)->first();
        
        if ($novel_status) {
            return $next($request);
        }
        return redirect('/kategori');
    }
}
