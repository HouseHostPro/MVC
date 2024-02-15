@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Propiedades')
@section('content')

    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-6" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal')}}">Principal</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
                <li class="breadcrumb-item active" aria-current="page">Propiedades</li>
            </ol>
        </nav>
        <div class="col-3 mt-3 text-end">
            <form method="get" action="{{ route('property.loadForm') }}">
                <button type="submit" class="btn bg-primary bg-opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus pb-1" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>Añadir propiedad
                </button>
            </form>
        </div>
    </div>
    <div class="row col-12">
        <div class=" col-2 mb-3">
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
                                    <tr>
                                        <th>Nombre propiedad</th>
                                        <th>Imagen</th>
                                        <th>Ubicación</th>
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
                    url: `http://localhost:8100/allProperties`
                }).done(function (propiedades) {
                    console.log(propiedades);
                    printProperties(propiedades);
                });

            })

            function printProperties(propiedad){

                const imagen = $('<img>').attr({
                    'src': 'https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/large_jpg/_FI.jpg?1563747560',
                    'style': 'height: 150px; width: 150px'
                });

                propiedad.forEach( function (value){

                    let fila = $('<tr>');
                    fila.append($('<td>').text(value.nom));

                    //Creamos la imagen y  la columna de la imagen
                    const celdaImagen = $('<td>').append(imagen.clone());
                    fila.append(celdaImagen);

                    fila.append($('<td>').text(value.nomCiutat));

                    console.log("entra");

                    //Creamos el botón, el formulario, la columna del botón y el formulario
                    let form = $('<form>').attr('method', 'get').attr('action', '/property/edit/' + value.id);
                    let botonEditar = $('<button>').attr('type', 'submit').addClass('btn bg-success bg-opacity-50').text('Editar');
                    form.append(botonEditar);
                    let celdaFormulario = $('<td>').append(form);
                    fila.append(celdaFormulario);

                    $('#tabla').append(fila);

                })
            }

            $('#atras').remove();

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



        </script>
    @endauth

@endsection




