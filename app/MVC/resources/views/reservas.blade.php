@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Reservas')
@section('content')
    <div class="row col-12 justify-content-between mb-4">
        <nav class="mt-3 col-6" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal')}}">Principal</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reservas</li>
            </ol>
        </nav>
        <div class="col-2 mt-3">
            <label>Buscar casa:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="table-responsive bg-white">
                            <table class="table table-hover mb-0 bg-white border-bottom border-dark">
                                <thead>
                                <tr class="text-center">
                                    <th>Nombre propiedad</th>
                                    <th>Fecha entrada/salida</th>
                                    <th>Personas</th>
                                    <th>Precio total</th>
                                    <th>Acciones</th>
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
                    console.log(reservas);
                    printReservas(reservas)
                });
            })
            function printReservas(reserva){
                reserva.forEach( function (value){

                    let fila = $('<tr>');
                    fila.append($('<td>').text(value.nomPropietat).addClass('text-center'));
                    fila.append($('<td>').text(value.data_inici + "-" + value.data_fi).addClass('text-center'));
                    fila.append($('<td>').text(value.persones).addClass('text-center'));
                    fila.append($('<td>').text(value.preu_total).addClass('text-center'));


                    //Creamos el botón, el formulario, la columna del botón y el formulario
                    //!!!CAMBIAR EL ACTION DEL BOTON!!!
                    let form = $('<form>').attr('method', 'get').attr('action', '/deleteComentario/' + value.propietat_id);
                    let botonVer = $('<button>').attr('type', 'submit').addClass('btn bg-primary bg-opacity-50').text('Ver');
                    form.append(botonVer);
                    let celdaFormulario = $('<td>').append(form).addClass('text-center');
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
        </script>

    @endauth

@endsection
