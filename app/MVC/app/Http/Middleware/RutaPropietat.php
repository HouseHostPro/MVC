<?php

namespace App\Http\Middleware;

use App\Models\Propietat;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Configuracio;

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
            $u === "serviciosByProperty/{id}" ||
            $u === "es" ||
            $u === "en" ||
            $u === "allImagesAjax" ||
            $u === "allEspaciosAjax" ||
            $u === "allEspaciosByPropertyAjax/{id}")
            return $next($request);
	}



        $id = explode("/", $url)[4];
        View::share('PROPIETAT_ID', $id);

        $id_plantilla = Propietat::where('id',$id)->value('plantilla_id');
        View::share('PLANTILLA', $id_plantilla);

        return $next($request);
    }
}
