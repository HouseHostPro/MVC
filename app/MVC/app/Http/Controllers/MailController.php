<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
require '../vendor/autoload.php';
use Mailgun\Mailgun;

class MailController extends Controller
{
    //
    public function emailprova() {
        /*$recipient = 'mplanissi@gmail.com';

        $response = Http::post("https://api.mailgun.net/v3/househostpromp.me/messages", [
            'auth' => ['api', env('MAILGUN_SECRET')],
            'form_params' => [
                'from' => 'example@example.com',
                'to' => $recipient,
                'subject' => 'Sample Email',
                'html' => view('mail.mailVerificacion')->render(),
            ],
        ]);

        if ($response->successful()) {
            return "Email sent successfully!";
        } else {
            return "Failed to send email.";
        }*/

        $secret = env('MAILGUN_SECRET');
        $endpoint = env('MAILGUN_ENDPOINT');
        $domain = env('MAILGUN_DOMAIN');

        $mgClient = Mailgun::create($secret, $endpoint);
        $params = array(
            'from'    => 'Excited User <noreply@househostpromp.me>',
            'to'      => 'mplanissi@gmail.com',
            'subject' => 'Hello testscsc',
            'text'    => 'Testing some Mailgun awesodsceawcfwerfcwwdmness!'
        );

        $mgClient->messages()->send($domain, $params);
    }
}
