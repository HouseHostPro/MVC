<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class RutaPropietat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = url() -> current();

        if ($url === "http://localhost:8100/allProperties" ||
            $url === "http://localhost:8100/findTraduccions" ||
            $url === "http://localhost:8100/allTraduccions" ||
            $url === "http://localhost:8100/serviciosAjax" ||
            $url === "http://localhost:8100/serviciosByProperty" ||
            $url === "http://localhost:8100/es" ||
            $url === "http://localhost:8100/en" ||
            $url === "http://localhost:8100/allImagesAjax")
            return $next($request);



        $id = explode("/", $url)[4];
        View::share('PROPIETAT_ID', $id);

        return $next($request);
    }
}
