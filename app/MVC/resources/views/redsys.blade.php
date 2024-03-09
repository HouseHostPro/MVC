<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>

    <script src="https://cdn.tailwindcss.com/3.0.12"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="h-auto w-80 bg-white p-3 rounded-lg border-black shadow-lg">
        <button type="button" id="atras" class="col-1 border-0 bg-white mb-3 text-end">
            <a href="{{ route('principal', ['id' => Session::get('reserva') -> propietat_id]) }}" class="text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
            </a>
        </button>
        <p class="text-xl font-semibold">{{__('Detalles del pago')}}</p>
        <div class="input_text mt-6 relative">
            <span class="absolute left-0 text-sm -top-4 text-blue-600">{{__('Desde')}}</span>
            <p>{{ $from }}</p>
        </div>
        <div class="input_text mt-8 relative">
            <span class="absolute left-0 text-sm -top-4 text-blue-600">{{__('Hasta')}}</span>
            <p>{{ $to }}</p>
        </div>
        <div class="input_text mt-8 relative">
            <span class="absolute left-0 text-sm -top-4 text-blue-600">{{__('Huéspedes')}}</span>
            <p>{{ $personas }}</p>
        </div>
        <div class="input_text mt-8 relative">
            <span class="absolute left-0 text-sm -top-4 text-blue-600">{{__('Precio limpieza')}}€</span>
            <p>{{ $limpieza }}</p>
        </div>


        <p class="text-lg text-left mt-4 text-gray-600 font-semibold">{{__('Total a pagar')}}: {{ $precioTotal }}€</p>
        <div class="flex justify-center mt-4">
            <button id="pay"
                    class="outline-none pay h-12 bg-blue-500 text-white mb-3 hover:bg-blue-800 rounded-lg w-1/2 cursor-pointer transition-all">{{__('Proceder al pago')}}</button>
            {!! $form !!}
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const payButton = document.getElementById('pay');
        const formButton = document.getElementById('btn_id');

        payButton.addEventListener('click', function(event) {
            event.preventDefault();
            formButton.click();
        });
    });
</script>
</body>

</html>

