<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Factura</title>
</head>
<body>
<div style="padding: 10px;">
    <table style="width: 100%;">
        <tr style="width: 100%;">
            <td style="width: 50%;">
                <label style="font-size: 40px; font-weight: bold;">{{__('Factura')}}</label>
            </td>
            <td style="width: 50%; text-align: right;">
            </td>
        </tr>
    </table>
    <table style="width: 100%; margin: 10px 0px;">
        <tr style="width: 100%;">
            <td style="width: 33%; line-height: 25px;">
                <label>{{__('Nombre propiedad')}}</label><br />
                <label style="font-weight: bold; font-size: 20px;"
                >{{Session::get('factura') -> nom_propietat}}</label
                >
                <br />
                <br />
                <br />
            </td>
            <td style="width: 33%; line-height: 25px;">
                <label>{{__('Cliente')}}</label><br />
                <label style="font-weight: bold; font-size: 20px;"
                >{{Session::get('factura') -> nom_client}} {{Session::get('factura') -> cognom1}} {{Session::get('factura') -> cognom2}}</label
                ><br />
                {{Session::get('factura') -> email}}<br />
                {{Session::get('factura') -> direccio}}<br />
            </td>
            <td style="width: 33%; margin: auto;">
            <span
                style="
                background: #e1e1e1;
                font-size: 30px;
                font-weight: bold;
                padding: 10px;
                color: #343a40;
              "
            >
              {{__('Pagado')}}</span
            >
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr style="background: #343a40; color: white;">
            <th style="padding: 10px;">
                {{__('Fecha inicio')}}
            </th>
            <th>
                {{__('Fecha fin')}}
            </th>
            <th>
                {{__('Nombre de acompañantes')}}
            </th>
            <th>
                {{__('Precio limpieza')}}
            </th>
            <th>
                {{__('Precio total')}}
            </th>
        </tr>
        <tr>
            <td>
                {{Session::get('factura') -> data_inici}}
            </td>
            <td>
                {{Session::get('factura') -> data_fi}}
            </td>
            <td>
                {{Session::get('factura') -> numero_acompanyants}}
            </td>
            <td>
                {{Session::get('factura') -> preu_neteja}}€
            </td>
            <td>
                {{Session::get('factura') -> preu_total}}€
            </td>
        </tr>
    </table>
    <table style="width: 100%; position: fixed; bottom: 0;">
        <tr style="width: 100%;">
            <td style="width: 50%;">
            </td>
            <td
                style="
              width: 50%;
              background-color: whitesmoke;
              text-align: center;
              padding: 10px;
            "
            >
                <label
                    style="
                font-size: 30px;
                color: #e1e1e1;
                text-transform: uppercase;
                margin: auto;
              "
                >Signature</label
                >
            </td>
        </tr>
    </table>
</div>
</body>
</html>

