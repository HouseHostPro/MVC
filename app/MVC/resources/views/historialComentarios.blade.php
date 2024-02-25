@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta')}}
@endsection
@section('title',__('Historial de comentarios'))
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-6 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal')}}">Principal</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta')}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Historial de comentarios')}}</li>
            </ol>
        </nav>
        <div class="col-sm-2 col-6 mt-sm-3 mt-1">
            <label>{{__('Buscar casa')}}:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
    <div class="col-12 row justify-content-center mt-sm-3 mt-4 mb-sm-4 mb-3">
        <h2 class="text-center">{{__('Comentarios de mis propiedades')}}</h2>
    </div>
    <div class="gradient-custom-1">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="table-responsive bg-white">
                            <table class="table table-hover mb-0 bg-white border-bottom border-dark">
                                <thead>
                                <tr class="text-center">
                                    <th>{{__('Nombre propiedad')}}</th>
                                    <th>{{__('Nombre Usuario')}}</th>
                                    <th>{{__('Descripción')}}</th>
                                    <th>{{__('Puntuación')}}</th>
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
    <!-- Crear Comentarios -->
    <div class="modal fade" id="crearComenatrio" tabindex="-1" aria-labelledby="cComenatrio" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cComenatrio">Añadir cometario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('comentario.store')}}" class="d-flex flex-column gap-3">
                        @csrf
                        <div class="col-12 rating-container" data-rating="">
                            <div class="rating" >
                                <span class="starE" data-rating="1">&#9733;</span>
                                <span class="starE" data-rating="2">&#9733;</span>
                                <span class="starE" data-rating="3">&#9733;</span>
                                <span class="starE" data-rating="4">&#9733;</span>
                                <span class="starE" data-rating="5">&#9733;</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                        </div>
                        <input type="text" id="rating" name="rating" hidden>
                        <div class="col-12 row justify-content-end">
                            <button type="submit" class="col-2 btn bg-primary bg-opacity-25 border border-dark">Añadir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function (){


            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/comentariosPropertiesAjax`
            }).done(function (comentarios) {
                console.log(comentarios);
                printCommnets(comentarios)
            });

        })


        function printCommnets(comentario){

            comentario.forEach( function (value){

                let fila = $('<tr>');
                fila.append($('<td>').text(value.nomPropietat).addClass('text-center'));
                fila.append($('<td>').text(value.nomUser).addClass('text-center'));
                fila.append($('<td>').text(value.comentario.comentari).addClass('w-50'));

                //Crear el rating per els comentaris
                let contenedor = $('<div>').addClass('col-12 rating-container').attr('data-rating', value.comentario.puntuacio);
                let rating = $('<div>').addClass('rating');

                for (let i = 1; i <= 5; i++) {
                    let estrella = $('<span>').addClass('star').attr('data-rating', i).html('&#9733;');
                    rating.append(estrella);
                }

                let TD = $('<td>');
                fila.append(TD);

                $('#tabla').append(fila);
                //Creamos el botón, el formulario, la columna del botón y el formulario
                let botonComment = $('<button>').attr({
                    'type':'submit',
                    'data-bs-toggle': 'modal',
                    'data-bs-target': '#crearComentario'
                }).addClass('btn bg-primary bg-opacity-50').text('{{__('Comentar')}}');
                let celdaFormulario = $('<td>').append(botonComment).addClass('text-center');
                fila.append(celdaFormulario);

                if(value.comentario.puntuacio !== null){

                    contenedor.append(rating).addClass('text-center');
                    TD.append(contenedor);

                    console.log("entra")
                    //Mostrar estrellas asignadas de cada usuario
                    $('.rating-container').each(function(index) {
                        var $container = $(this);
                        var ratingValue = $container.attr('data-rating');
                        activateStars($container,ratingValue);
                    });
                }
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


        function activateStars($container, ratingValue) {
            $container.find('.star').removeClass('active');
            $container.find('.star').each(function() {
                if ($(this).attr('data-rating') <= ratingValue) {
                    $(this).addClass('active');
                }
            });
        }
    </script>
@endsection
