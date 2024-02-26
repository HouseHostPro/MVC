@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta')}}
@endsection
@section('title',__('Reservas'))
@section('content')
    <div class="row col-12 justify-content-between mb-4">
        <nav class="mt-3 col-sm-6 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal')}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta')}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Reservas')}}</li>
            </ol>
        </nav>
        <div class="col-sm-2 col-6 mt-sm-3 mt-1">
            <label>{{__('Buscar casa')}}:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-12">
                        <div class="table-responsive bg-white">
                            <table class="table table-hover mb-0 bg-white">
                                <thead>
                                <tr class="text-center">
                                    <th>{{__('Nombre propiedad')}}</th>
                                    <th>{{__('Fecha entrada/salida')}}</th>
                                    <th>{{__('Personas')}}</th>
                                    <th>{{__('Precio total')}}</th>
                                    <th>{{__('Acciones')}}</th>
                                </tr>
                                </thead>
                                <tbody id="tabla">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @auth
        <script>

            $(document).ready(function (){

                $.ajax({
                    method: 'GET',
                    url: `http://localhost:8100/reservasAjax`
                }).done(function (reservas) {
                    printReservas(reservas)
                });

            function printReservas(reserva){

                reserva.forEach( function (value){

                    let fecha_ini = new Date(value.data_inici);
                    let fecha_fin = new Date(value.data_fi);

                    let fecha_ini_format = fecha_ini.toLocaleDateString('es-ES', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                    let fecha_fin_format = fecha_fin.toLocaleDateString('es-ES', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });

                    let fila = $('<tr>');
                    fila.append($('<td>').text(value.nomPropietat).attr('data-label', 'Nombre propiedad'));
                    fila.append($('<td>').text(fecha_ini_format + " - " + fecha_fin_format).attr('data-label', 'Fecha entrada/salida'));
                    fila.append($('<td>').text(value.persones).attr('data-label', 'Personas'));
                    fila.append($('<td>').text(value.preu_total + "€").attr('data-label', 'Precio total'));


                    //Creamos el botón, el formulario, la columna del botón y el formulario
                    //!!!CAMBIAR EL ACTION DEL BOTON!!!
                    let form = $('<form>').attr('method', 'get').attr('action', '/deleteComentario/' + value.propietat_id);
                    let botonVer = $('<button>').attr('type', 'submit').addClass('btn bg-primary bg-opacity-50').text('{{__('Ver')}}');
                    form.append(botonVer);
                    let celdaFormulario = $('<td>').append(form).attr('data-label', 'Acción');
                    fila.append(celdaFormulario);

                    $('#tabla').append(fila);
                })
            }
            $('#cercador').on("input",function (){

                const caracters = $(this).val().toUpperCase();
                const tabla = $('#tabla');

                tabla.find('tr').each(function () {
                    const nombrePropiedad = $(this).find('td:first').text().toUpperCase();
                    if (nombrePropiedad.includes(caracters)) {
                        $(this).show(); // Mostrar fila si coincide con la búsqueda
                    } else {
                        $(this).hide(); // Ocultar fila si no coincide con la búsqueda

                    }
                });
            });

            $('#atras').remove();
            })
        </script>

    @endauth

@endsection
