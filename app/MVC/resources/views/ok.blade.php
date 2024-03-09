<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Pago realizado</title>
</head>
<body>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }
    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }
    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
    }
    i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
    }
    .card {
        background: white;
        padding: 60px 60px 30px 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        display: inline-block;
        margin: 0 auto;
    }

    table, th, td {
        text-align: left;
        padding: 5px;
    }

    button {
        all: unset;
        font-weight: bold;
        cursor: pointer;
    }

    .bFlex {
        margin-top: 30px;
        display: flex;
    }

    #download {
        margin-left: 115px;
    }


</style>
<body>
<div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
    </div>
    <h1>{{__('Éxito')}}</h1>
    <p>{{__('Pago realizado!')}}<br/>{{__('Pulsa este botón para descargar tu factura')}}</p>
    <div class="bFlex">
        <button type="button" id="atras" class="col-1 border-0 bg-white mb-3 text-end">
            <a href="{{ route('principal', ['id' => Session::get('reserva') -> propietat_id]) }}" class="text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                </svg>
            </a>
        </button>
        <button id="download">{{__('Descargar')}}</button>
    </div>
</div>
</body>

<script>
    $("#download").click(function () {
        window.location.href = "{{ route('facturaPdf') }}";
    });

    $("#download").addEventListener("click", function () {
        window.location.href = "{{ route('facturaPdf') }}";
    });
</script>
</body>
</html>
</body>
</html>
