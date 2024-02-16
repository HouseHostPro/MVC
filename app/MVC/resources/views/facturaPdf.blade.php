<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Factura</h1>

<table>
    <tr>
        <td>Propietario</td>
        <td>{{Session::get('factura') -> nom_propietari}}</td>
    </tr>
    <tr>
        <td>Nombre propiedad</td>
        <td>{{Session::get('factura') -> nom_propietat}}</td>
    </tr>
    <tr>
        <td>Cliente</td>
        <td>{{Session::get('factura') -> nom_client}}</td>
    </tr>
    <tr>
        <td>Primer apellido</td>
        <td>{{Session::get('factura') -> cognom1}}</td>
    </tr>
    <tr>
        <td>Segundo apellido</td>
        <td>{{Session::get('factura') -> cognom2}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{Session::get('factura') -> email}}</td>
    </tr>
    <tr>
        <td>Dirección</td>
        <td>{{Session::get('factura') -> direccio}}</td>
    </tr>
    <tr>
        <td>Nombre de acompañantes</td>
        <td>{{Session::get('factura') -> numero_acompanyants}}</td>
    </tr>
    <tr>
        <td>Precio limpieza</td>
        <td>{{Session::get('factura') -> preu_neteja}}</td>
    </tr>
    <tr>
        <td>Fecha inicio</td>
        <td>{{Session::get('factura') -> data_inici}}</td>
    </tr>
    <tr>
        <td>Fecha fin</td>
        <td>{{Session::get('factura') -> data_fi}}</td>
    </tr>
    <tr>
        <td>Precio</td>
        <td>{{Session::get('factura') -> preu_total}}</td>
    </tr>
</table>
</body>
</html>
