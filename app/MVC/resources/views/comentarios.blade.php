@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta', ['id' => $PROPIETAT_ID])}}
@endsection
@section('title',__('Comentarios'))
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-6 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $PROPIETAT_ID])}}">Principal</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $PROPIETAT_ID])}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Comentarios')}}</li>
            </ol>
        </nav>
        <div class="col-sm-2 col-6 mt-sm-3 mt-1">
            <label>{{__('Buscar casa')}}:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
    <div class="col-12 row justify-content-center mt-sm-3 mt-4 mb-sm-4 mb-3">
        <h2 class="text-center">{{__('Mis comentarios')}}</h2>
    </div>
    <div class="gradient-custom-1">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table" class="table table-hover mb-0 bg-white" >
                                <thead>
                                <tr class="text-center ">
                                    <th>{{__('Nombre propiedad')}}</th>
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

        <script>

            /*$(document).ready(function (){

                $.ajax({
                    method: 'GET',
                    url: `http://localhost:8100/comentariosUserAjax`
                }).done(function (comentarios) {
                    printCommnets(comentarios)
                });
            })*/
            printCommnets(@json($comentarios))

            function printCommnets(comentario){

                comentario.forEach( function (value){

                    let fila = $('<tr>');
                    fila.append($('<td>').text(value.nomPropietat).attr('data-label', 'Nombre propiedad'));

                    //Le pongo una id al td para darle estilo, porque si el comentario es muy grande no me ocupe todo el td
                    let divP = $('<div>');
                    let p = $('<p>').text(value.comentari)
                    divP.append(p)
                    let tdDesc = $('<td>').attr('data-label','Descripción').attr('id','tdP');
                    tdDesc.append(divP);
                    fila.append(tdDesc);


                    //Crear el rating per els comentaris
                    let contenedor = $('<div>').addClass('col-12 rating-container').attr('data-rating', value.puntuacio);
                    let rating = $('<div>').addClass('rating');


                    if(value.puntuacio !== null){

                        for (let i = 1; i <= 5; i++) {
                            let estrella = $('<span>').addClass('star').attr('data-rating', i).html('&#9733;');
                            rating.append(estrella);
                        }

                        let TD = $('<td>').attr('data-label','Puntuación');
                        contenedor.append(rating);
                        TD.append(contenedor);
                        fila.append(TD);
                        $('#tabla').append(fila);

                        //Mostrar estrellas asignadas de cada usuario
                        $('.rating-container').each(function(index) {

                            let $container = $(this);
                            let ratingValue = $container.attr('data-rating');
                            activateStars($container,ratingValue);
                        });
                    }else {

                        let rating = $('<div>').addClass('rating');

                        for (let i = 1; i <= 5; i++) {
                            let estrella = $('<span>').addClass('star').attr('data-rating', i).html('&#9733;');
                            rating.append(estrella);
                        }

                        let TD = $('<td>').attr('data-label','Puntuación').addClass('invisible');
                        fila.append(TD);
                    }

                    //Reemplazar las variables para que las coja en get
                    let url = "{{ route('comentario.delete.get', ['idProp' => ':idProp', 'estat' => ':estat', 'id' => ':id']) }}";
                    url = url.replace(':idProp',value.tc_id).replace(':estat',value.fa_contesta).replace(':id',{{$PROPIETAT_ID}});

                    $('#tabla').append(fila);
                    //Creamos el botón, el formulario, la columna del botón y el formulario
                    let form = $('<form>').attr('method', 'get').attr('action', url);
                    let botonEliminar = $('<button>').attr('type', 'submit').attr('id','buttonForm').addClass('btn bg-danger bg-opacity-50').text('{{__('Eliminar')}}');
                    form.append(botonEliminar);
                    let celdaFormulario = $('<td>').append(form).attr('data-label','Acción');
                    fila.append(celdaFormulario);

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

