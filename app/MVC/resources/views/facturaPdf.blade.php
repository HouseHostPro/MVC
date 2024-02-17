<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('Factura')}}</title>
</head>
<body>
<h1>{{__('Factura')}}</h1>

<table>
    <tr>
        <td>{{__('Propietario')}}</td>
        <td>{{Session::get('factura') -> nom_propietari}}</td>
    </tr>
    <tr>
        <td>{{__('Nombre propiedad')}}</td>
        <td>{{Session::get('factura') -> nom_propietat}}</td>
    </tr>
    <tr>
        <td>{{__('Cliente')}}</td>
        <td>{{Session::get('factura') -> nom_client}}</td>
    </tr>
    <tr>
        <td>{{__('Primer apellido')}}</td>
        <td>{{Session::get('factura') -> cognom1}}</td>
    </tr>
    <tr>
        <td>{{__('Segundo apellido')}}</td>
        <td>{{Session::get('factura') -> cognom2}}</td>
    </tr>
    <tr>
        <td>{{__('E-mail')}}</td>
        <td>{{Session::get('factura') -> email}}</td>
    </tr>
    <tr>
        <td>{{__('Dirección')}}</td>
        <td>{{Session::get('factura') -> direccio}}</td>
    </tr>
    <tr>
        <td>{{__('Nombre de acompañantes')}}</td>
        <td>{{Session::get('factura') -> numero_acompanyants}}</td>
    </tr>
    <tr>
        <td>{{__('Precio limpieza')}}</td>
        <td>{{Session::get('factura') -> preu_neteja}}</td>
    </tr>
    <tr>
        <td>{{__('Fecha inicio')}}</td>
        <td>{{Session::get('factura') -> data_inici}}</td>
    </tr>
    <tr>
        <td>{{__('Fecha fin')}}</td>
        <td>{{Session::get('factura') -> data_fi}}</td>
    </tr>
    <tr>
        <td>{{__('Precio total')}}</td>
        <td>{{Session::get('factura') -> preu_total}}</td>
    </tr>
</table>
</body>
</html>
