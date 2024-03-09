<?php

namespace App\Http\Middleware;

use App\Models\Propietat;
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

        if ($url === "http://www.househostpromp.me/allProperties" ||
            $url === "http://www.househostpromp.me/findTraduccions" ||
            $url === "http://www.househostpromp.me/allTraduccions" ||
            $url === "http://www.househostpromp.me/serviciosAjax" ||
            $url === "http://www.househostpromp.me/serviciosByProperty/{id}" ||
            $url === "http://www.househostpromp.me/es" ||
            $url === "http://www.househostpromp.me/en" ||
            $url === "http://www.househostpromp.me/allImagesAjax" ||
            $url === "http://www.househostpromp.me/allEspaciosAjax" ||
            $url === "http://www.househostpromp.me/allEspaciosByPropertyAjax/{id}"||
            $url === "http://www.househostpromp.me/comentariosUserAjax"||
            $url === "http://www.househostpromp.me/comentariosPropertiesAjax"||
            $url === "http://www.househostpromp.me/reservasAjax"||
            $url === "http://www.househostpromp.me/reservasPropertiesAjax"||
            $url === "http://www.househostpromp.me/imagenesPortadaAjax")
            return $next($request);



        $id = explode("/", $url)[4];
        View::share('PROPIETAT_ID', $id);

        $id_plantilla = Propietat::where('id',explode("/", $url)[4])->value('plantilla_id');
        View::share('PLANTILLA', $id_plantilla);

        return $next($request);
    }
}
