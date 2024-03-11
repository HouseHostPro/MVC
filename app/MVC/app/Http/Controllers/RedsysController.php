<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Propietat;
use App\Models\Reserva;
use App\Models\Traduccio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Ssheduardo\Redsys\Facades\Redsys;
use Barryvdh\DomPDF\Facade\Pdf;

class RedsysController extends Controller
{
    public function index(Request $request)
    {
        try {
            $key = config('redsys.key');
            $code = config('redsys.merchantcode');
            $from = $request -> frombd;
            $to = $request -> tobd;
            $personas = $request -> personas;
            $limpieza = 0;
            if (isset($request -> limpieza)) {
                $limpieza = $request -> limpieza;
            }
            $mascotas = $request -> mascotas;
            $precioTotal = intval(str_replace('€','', $request -> ptotal));

            Session::put('num_persones', $personas);
            Session::put('neteja', $limpieza);
            Session::put('preu', $precioTotal);
            Session::put('data_inici', $from);
            Session::put('data_fi', $to);


            $reserva = new Reserva();
            $reserva -> preu_total = $precioTotal;
            $reserva -> persones = $personas;
            $reserva -> usuari_id = Auth::user() -> id;
            $reserva -> propietat_id = explode("/", url() ->current())[4];
            $reserva -> data_inici = $request -> frombd;
            $reserva -> data_fi = $request -> tobd;

            $nomPropietat = Propietat::where('id', $reserva -> propietat_id) -> first() -> nom;
            $nomTraduit = Traduccio::where(['code' => $nomPropietat, 'lang' => app() -> getLocale()]) -> first() -> value;

            Session::put('nom_casa', $nomTraduit);

            Session::put('reserva', $reserva);

            Redsys::setAmount((int) $precioTotal);
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
            Redsys::setTradeName('HouseHostPro');
            Redsys::setTitular(Auth::user() -> nom . ' ' . Auth::user() -> cognom1);
            Redsys::setProductDescription('Reserva en ' . $nomTraduit);
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

    public function ok(Request $request) {

        $reserva = Session::get('reserva');
        $reserva -> estat = "PAGADA";
        /*$reserva -> data_inici = date("y-m-d", strtotime($reserva -> data_inici));
        $reserva -> data_fi = date("y-m-d", strtotime($reserva -> data_fi));*/
        $reserva -> save();

        $factura = new Factura();
        $factura -> reserva_id = $reserva -> id;
        $factura -> nom_propietat = Session::get('nom_casa');
        $factura -> nom_propietari = 'Carlos Moyà';
        $factura -> nom_client = Auth::user() -> nom;
        $factura -> cognom1 = Auth::user() -> cognom1;
        $factura -> cognom2 = Auth::user() -> cognom2;
        $factura -> email = Auth::user() -> email;
        $factura -> telefon = Auth::user() -> telefon;
        $factura -> direccio = Auth::user() -> direccio;

        $factura -> numero_acompanyants = Session::get('num_persones');
        $factura -> preu_neteja = Session::get('neteja');
        $factura -> data_inici = Session::get('data_inici');
        $factura -> data_fi = Session::get('data_fi');
        $factura -> preu_total = Session::get('preu');

        Session::put('factura', $factura);
        $factura -> save();

        $message = $request -> all();
        if (isset($message['Ds_MerchantParameters'])) {
            $decode = json_decode(base64_decode($message['Ds_MerchantParameters']), true);
            $date = urldecode($decode['Ds_Date']);
            $hour = urldecode($decode['Ds_Hour']);
            $decode['Ds_Date'] = $date;
            $decode['Ds_Hour'] = $hour;
        }

        return view('ok');
    }

    public function exportPdf() {
        $pdf = PDF::loadView('factura2');
        return $pdf -> download('factura');
    }
}
