@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta', ['id' => $PROPIETAT_ID])}}
@endsection
@section('title',__('Historial de comentarios'))
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-6 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $PROPIETAT_ID])}}">Principal</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $PROPIETAT_ID])}}">{{__('Cuenta')}}</a></li>
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
                            <table id="table" class="table table-hover mb-0 bg-white">
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
    <input type="hidden" id="nomUsuari" value="{{$user->nom}}">
    <!-- Crear Comentarios -->
    <div class="modal fade" id="crearComentario" tabindex="-1" aria-labelledby="cComenatrio" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cComenatrio">Añadir cometario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="get" action="{{route('comentario.store.get')}}" class="d-flex flex-column gap-3">
                        @csrf
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                        </div>
                        <input type="text" id="rating" name="rating" hidden>
                        <input type="text" id="tcId" name="tcId" hidden>
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
                console.log(comentarios)
                printCommnets(comentarios)
            });

        })

        function printCommnets(comentario){

            let nomUsuari = $('#nomUsuari').val();
            let fa_contesta_FC = {};

            comentario.forEach( function (value){

                let fila = $('<tr>');
                fila.append($('<td>').text(value.nomPropietat).attr('data-label', 'Nombre propiedad'));
                fila.append($('<td>').text(value.nomUser));

                //Le pongo una id al td para darle estilo, porque si el comentario es muy grande no me ocupe todo el td
                let divP = $('<div>');
                let p = $('<p>').text(value.comentario.comentari)
                divP.append(p)
                let tdDesc = $('<td>').attr('data-label','Descripción').attr('id','tdP');
                tdDesc.append(divP);
                fila.append(tdDesc);

                //Crear el rating per els comentaris
                let contenedor = $('<div>').addClass('col-12 rating-container').attr('data-rating', value.comentario.puntuacio);


                $('#tabla').append(fila);

                if(value.comentario.puntuacio !== null){

                    let rating = $('<div>').addClass('rating');

                    for (let i = 1; i <= 5; i++) {
                        let estrella = $('<span>').addClass('star').attr('data-rating', i).html('&#9733;');
                        rating.append(estrella);
                    }

                    let TD = $('<td>').attr('data-label','Puntuación');
                    fila.append(TD);

                    let divButtons = $('<div>').addClass('d-flex justify-content-sm-between justify-content-end gap-1');
                    //Creamos el botón, el formulario, la columna del botón y el formulario
                    let botonComment = $('<button>').attr({
                        'type':'button',
                        'id': 'comentar_' + value.comentario.tc_id,
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#crearComentario'
                    }).addClass('btn bg-primary bg-opacity-50').text('{{__('Comentar')}}');
                    botonComment.click(function (){
                        $('#tcId').val(value.comentario.tc_id);
                    })
                    divButtons.append(botonComment);
                    if(value.nomUser === nomUsuari) {
                        //Reemplazar las variables para que las coja en get
                        let url = "{{ route('comentario.delete.get', ['idProp' => ':idProp', 'estat' => ':estat', 'id' => ':id']) }}";
                        url = url.replace(':idProp',value.comentario.tc_id).replace(':estat',value.comentario.fa_contesta).replace(':id',{{$PROPIETAT_ID}});

                        //Creamos el botón, el formulario, la columna del botón y el formulario
                        let form = $('<form>').attr('method', 'get').attr('action', url);
                        let botonEliminar = $('<button>').attr('type', 'submit').addClass('btn bg-danger bg-opacity-50').text('{{__('Eliminar')}}');
                        form.append(botonEliminar);
                        divButtons.append(form);
                    }

                    let celdaFormulario = $('<td>').append(divButtons).addClass('text-center').attr('data-label','Acción');
                    fila.append(celdaFormulario);

                    contenedor.append(rating);
                    TD.append(contenedor);

                    //Mostrar estrellas asignadas de cada usuario
                    $('.rating-container').each(function(index) {
                        let $container = $(this);
                        let ratingValue = $container.attr('data-rating');
                        activateStars($container,ratingValue);
                    });
                    let tc_id = value.comentario.tc_id;
                    let fa_contesta = value.comentario.fa_contesta;

                    if (!fa_contesta_FC.hasOwnProperty(tc_id)) {
                        fa_contesta_FC[tc_id] = [];
                    }
                    fa_contesta_FC[tc_id].push(fa_contesta);


                }else {
                    let rating = $('<div>').addClass('rating');

                    for (let i = 1; i <= 5; i++) {
                        let estrella = $('<span>').addClass('star').attr('data-rating', i).html('&#9733;');
                        rating.append(estrella);
                    }

                    let TD = $('<td>').attr('data-label','Puntuación').addClass('invisible');
                    fila.append(TD);

                    let divButtons = $('<div>').addClass('d-flex justify-content-sm-between justify-content-end gap-1');
                    //Creamos el botón, el formulario, la columna del botón y el formulario
                    let botonComment = $('<button>').attr({
                        'type':'button',
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#crearComentario'
                    }).addClass('btn bg-primary bg-opacity-50 invisible').text('{{__('Comentar')}}');
                    botonComment.click(function (){
                        $('#tcId').val(value.comentario.tc_id);
                    })

                    divButtons.append(botonComment);
                    if(value.nomUser === nomUsuari) {
                        //Reemplazar las variables para que las coja en get
                        let url = "{{ route('comentario.delete.get', ['idProp' => ':idProp', 'estat' => ':estat', 'id' => ':id']) }}";
                        url = url.replace(':idProp',value.comentario.tc_id).replace(':estat',value.comentario.fa_contesta).replace(':id',{{$PROPIETAT_ID}});

                        //Creamos el botón, el formulario, la columna del botón y el formulario
                        let form = $('<form>').attr('method', 'get').attr('action', url);
                        let botonEliminar = $('<button>').attr('type', 'submit').addClass('btn bg-danger bg-opacity-50').text('{{__('Eliminar')}}');
                        form.append(botonEliminar);
                        divButtons.append(form);
                    }

                    let celdaFormulario = $('<td>').append(divButtons).addClass('text-center').attr('data-label','Acción');
                    fila.append(celdaFormulario);

                    let tc_id = value.comentario.tc_id;
                    let fa_contesta = value.comentario.fa_contesta;

                    if (!fa_contesta_FC.hasOwnProperty(tc_id)) {
                        fa_contesta_FC[tc_id] = [];
                    }
                    fa_contesta_FC[tc_id].push(fa_contesta);
                }

                for (let tc_id in fa_contesta_FC) {
                    if (fa_contesta_FC[tc_id].includes('F') && fa_contesta_FC[tc_id].includes('C')) {
                        $('#comentar_' + tc_id).addClass('invisible'); // Deshabilitar el botón correspondiente
                    }
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
