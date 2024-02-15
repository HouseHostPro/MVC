<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Ssheduardo\Redsys\Facades\Redsys;

class RedsysController extends Controller
{
    public function index(Request $request)
    {
        try {
            $key = config('redsys.key');
            $code = config('redsys.merchantcode');
            $from = $request -> from;
            $to = $request -> to;
            $personas = $request -> personas;
            $limpieza = 0;
            if (isset($request -> limpieza)) {
                $limpieza = $request -> limpieza;
            }
            $mascotas = $request -> mascotas;
            $precioTotal = $request -> ptotal;
            $total = "278";
            $description = "blablabla";

            Redsys::setAmount(rand(10, 600));
            Redsys::setOrder(time());
            Redsys::setMerchantcode($code); //Reemplazar por el código que proporciona el banco
            Redsys::setCurrency('978');
            Redsys::setTransactiontype('0');
            Redsys::setTerminal('1');
            Redsys::setMethod('T'); //Solo pago con tarjeta, no mostramos iupay
            Redsys::setNotification(config('redsys.url_notification')); //Url de notificacion
            Redsys::setUrlOk(config('redsys.url_ok')); //Url OK
            Redsys::setUrlKo(config('redsys.url_ko')); //Url KO
            Redsys::setVersion('HMAC_SHA256_V1');
            Redsys::setTradeName('Tienda S.L');
            Redsys::setTitular('Pedro Risco');
            Redsys::setProductDescription('Reserva en ');
            Redsys::setEnviroment('test'); //Entorno test
            Redsys::setAttributesSubmit('btn_submit', 'btn_id', '', 'display:none');

            $signature = Redsys::generateMerchantSignature($key);
            Redsys::setMerchantSignature($signature);

            $form = Redsys::createForm();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return view('redsys', compact(
            'form',
            'from', 'to', 'personas', 'limpieza', 'mascotas', 'precioTotal'));
    }
}
