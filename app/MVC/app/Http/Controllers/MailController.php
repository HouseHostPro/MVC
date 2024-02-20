<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
require '../vendor/autoload.php';
use Mailgun\Mailgun;

class MailController extends Controller
{
    public function emailprova() {
        $secret = env('MAILGUN_SECRET');
        $endpoint = env('MAILGUN_ENDPOINT');
        $domain = env('MAILGUN_DOMAIN');

        $mgClient = Mailgun::create($secret, $endpoint);
        $params = array(
            'from'    => 'No-reply <noreply@' . $domain . '>',
            'to'      => 'mplanissi@gmail.com',
            'subject' => 'Verificación de correo',
            'html'    => view('mail.mailVerificacion') -> render(),
        );

        $mgClient->messages()->send($domain, $params);
        return view('mail.verificacionEnviada');
    }

    public function verificar(Request $request) {
        $msg = 'ERROR NO COINCIDEIX';
        if ($request -> correo === 'mplaniscd@gmail.com')
            $msg = "OK";

        return view('verificat', compact('msg'));
    }
}
