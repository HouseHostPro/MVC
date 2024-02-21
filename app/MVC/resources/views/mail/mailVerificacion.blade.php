<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('Verificación de correo')}}</title>
</head>
<body>
    Buenas,
    Tu cuenta ha sido creada con éxito, solo falta verificarla. Pulsa este link para verificar.
    Nota: el link expirará en 30 minutos
    <form method="post" action="{{route('email.verificar')}}">
        @csrf
        <input type="hidden" name="correo" value="mplanissi@gmail.com">
        <button>Verificar</button>
    </form>

<script>
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
</script>
</body>
</html>
