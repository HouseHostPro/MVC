<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Configuracio;
use App\Models\Propietat;

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

        if (count(explode('/', $url)) > 2) {
	    $u = explode("/", $url)[2];

        if ($u === "allProperties" ||
            $u === "findTraduccions" ||
            $u === "allTraduccions" ||
            $u === "serviciosAjax" ||
            $u === "serviciosByProperty" ||
            $u === "es" ||
            $u === "en" ||
            $u === "allImagesAjax")
            return $next($request);
	}

	//$domini = explode('/', url() -> current())[2];
	//if ($domini === "www.househostpromp.me")
	//	return $next($request);

        //$propietat = Propietat::where('id', Configuracio::select('propietat_id') -> where('valor', $domini) -> first() -> propietat_id) -> first();


        $id = explode("/", $url)[4];
        View::share('PROPIETAT_ID', $id);
	//$request -> merge(['dominiCasa' => $propietat -> id]);

        return $next($request);
    }
}
