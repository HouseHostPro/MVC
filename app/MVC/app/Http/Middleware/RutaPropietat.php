<?php

namespace App\Http\Middleware;

use App\Models\Propietat;
use App\Models\Traduccio;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
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

        if (Str::contains($url, "househostpromp.me/allProperties") ||
            Str::contains($url,"househostpromp.me/findTraduccions") ||
                Str::contains($url,"househostpromp.me/allTraduccions") ||
                    Str::contains($url,"househostpromp.me/serviciosAjax") ||
                        Str::contains($url,"househostpromp.me/serviciosByProperty/{id}") ||
                            Str::contains($url,"househostpromp.me/es") ||
                                Str::contains($url,"househostpromp.me/en") ||
                                    Str::contains($url,"househostpromp.me/allImagesAjax/{id}") ||
                                        Str::contains($url,"househostpromp.me/allEspaciosAjax") ||
                                            Str::contains($url,"househostpromp.me/allEspaciosByPropertyAjax/{id}")||
                                                Str::contains($url,"househostpromp.me/comentariosUserAjax")||
                                                    Str::contains($url,"househostpromp.me/comentariosPropertiesAjax")||
                                                        Str::contains($url,"househostpromp.me/reservasAjax")||
                                                            Str::contains($url,"househostpromp.me/reservasPropertiesAjax")||
                                                                Str::contains($url,"househostpromp.me/imagenesPortadaAjax"))
            return $next($request);



        $id = explode("/", $url)[4];
        View::share('PROPIETAT_ID', $id);

        $propietatActual = Propietat::find($id);

        $nomTraduit = Traduccio::where('code', $propietatActual -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;
        View::share('NOM_PROPIETAT', $nomTraduit);

        $id_plantilla = Propietat::where('id',explode("/", $url)[4])->value('plantilla_id');
        View::share('PLANTILLA', $id_plantilla);

        return $next($request);
    }
}
