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

        if ($url === "http://localhost:8100/allProperties" ||
            $url === "http://localhost:8100/findTraduccions" ||
            $url === "http://localhost:8100/allTraduccions" ||
            $url === "http://localhost:8100/serviciosAjax" ||
            $url === "http://localhost:8100/serviciosByProperty/{id}" ||
            $url === "http://localhost:8100/es" ||
            $url === "http://localhost:8100/en" ||
            $url === "http://localhost:8100/allImagesAjax/{id}" ||
            $url === "http://localhost:8100/allEspaciosAjax" ||
            $url === "http://localhost:8100/allEspaciosByPropertyAjax/{id}"||
            $url === "http://localhost:8100/comentariosUserAjax"||
            $url === "http://localhost:8100/comentariosPropertiesAjax"||
            $url === "http://localhost:8100/reservasAjax"||
            $url === "http://localhost:8100/reservasPropertiesAjax"||
            $url === "http://localhost:8100/imagenesPortadaAjax")
            return $next($request);



        $id = explode("/", $url)[4];
        View::share('PROPIETAT_ID', $id);

        $id_plantilla = Propietat::where('id',$id)->value('plantilla_id');
        View::share('PLANTILLA', $id_plantilla);

        return $next($request);
    }
}
