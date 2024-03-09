@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta', ['id' => $PROPIETAT_ID])}}
@endsection
@section('title',__('Propiedades'))
@section('content')

    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-6 col-11" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $PROPIETAT_ID])}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $PROPIETAT_ID])}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Propiedades')}}</li>
            </ol>
        </nav>
        <div class="col-sm-2 col-6 my-sm-3 my-2">
            <label>{{__('Buscar propiedad')}}:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
        <div class="gradient-custom-1 ">
            <div class="mask d-flex align-items-center ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-8 col-12">
                            <div class="table-responsive bg-white">
                                <table id="table" class="table table-hover mb-0 bg-white border-bottom border-dark">
                                    <thead>
                                    <tr>
                                        <th>{{__('Nombre propiedad')}}</th>
                                        <th>{{__('Imagen')}}</th>
                                        <th>{{__('Ubicación')}}</th>
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

                printProperties(@json($propietats))

                /*$.ajax({
                    method: 'GET',
                    url: `http://localhost:8100/allProperties`
                }).done(function (propiedades) {

                    for (const p of propiedades) {
                        $.ajax({
                            method: 'GET',
                            url: '{{ route('property.traduccions') }}',
                            data: {
                                "nom": p.nom
                            }
                        }).done( function (traduccions) {
                            const nomTraduit = traduccions[0].filter((tr) => tr.lang === '{{ app() -> getLocale() }}')[0].value;
                            $('td:contains("' + p.nom + '")').html(nomTraduit);
                        });
                    }

                    printProperties(propiedades);
                });*/
                function resizeSpan() {
                    let windowWidth = $(window).width();

                    if (windowWidth < 540) {
                        $('#palabra').hide();
                        $('#icono').css({"width":"30","height":"30"});
                    } else {
                        $('#palabra').show();
                        $('th').addClass('text-center');
                    }
                }


                $(window).resize(resizeSpan);
                resizeSpan();

            })

            function printProperties(propiedad){

                const imagen = $('<img>').attr({
                    'src': 'https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/large_jpg/_FI.jpg?1563747560',
                    'style': 'height: 150px; width: 150px'
                });

                propiedad.forEach( function (value){

                    let fila = $('<tr>');
                    fila.append($('<td>').text(value.nom).attr('data-label', 'Nombre propiedad'));

                    //Creamos la imagen y  la columna de la imagen
                    const celdaImagen = $('<td>').append(imagen.clone()).attr('data-label', 'Imagen');
                    fila.append(celdaImagen);

                    fila.append($('<td>').text(value.nomCiutat).attr('data-label', 'Ubicación'));

                    //Creamos el botón, el formulario, la columna del botón y el formulario
                    let editUrl = "{{ route('property.edit', ['id' => $PROPIETAT_ID, ':prop_id']) }}";
                    let form = $('<form>').attr('method', 'get').attr('action', editUrl.replace(':prop_id', value.id));

                    let botonEditar = $('<button>').attr('type', 'submit').addClass('btn bg-success bg-opacity-50').text('{{__('Editar')}}');
                    form.append(botonEditar);
                    let celdaFormulario = $('<td>').append(form).attr('data-label', 'Acción');
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



