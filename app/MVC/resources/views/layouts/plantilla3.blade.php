<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Esta és la página principal de la casa.">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('build/assets/plantilla3.css')}}">
    <script src="{{asset('build/assets/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <!-- Date-picker -->
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>


    <!--Carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Google Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body style="height: 100vh;" class="d-flex flex-column justify-content-between">
<div>

    @include('components.header')
    <main class="container-fluid d-flex justify-content-center" >
        <div id="container-principal" class="container-sm" >

            @yield('content')
        </div>
    </main>
</div>
<!-- Expresión regular para que solo ponga el footer cuando la url sea /property/(cualquier número) -->
@php
    $url = request()->path();
@endphp

@if(preg_match('/^property\/\d+$/', $url))
    @include('components.footer')
@endif
<script>
    $(document).ready(function() {

        //Pintar imagenes y model de imagenes
        $(function () {

            function resizeImage() {
                let windowWidth = $(window).width();

                if (windowWidth < 540) {
                    // Ocultar las imágenes en las columnas col-6
                    $('#img-hide').hide();
                    // Ajustar el tamaño de la imagen firstImage para ocupar todo el contenedor
                    $('#frontCasa').addClass('full-width rounded');

                } else {
                    // Mostrar las imágenes en las columnas col-6
                    $('#img-hide').show();
                    // Eliminar la clase que ajusta el tamaño de la imagen firstImage
                    $('#frontCasa').removeClass('full-width rounded-end');

                }
            }

            $(window).resize(resizeImage);

            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/allImagesAjax/{{$PROPIETAT_ID}}`
            }).done(function (imagenes) {
                printImagenes(imagenes)
            });

            $.ajax({
                method: 'GET',
                url: `http://www.househostpromp.me/findNomTraduit/{{ $PROPIETAT_ID }}`
            }).done(function (nom) {
                $('#headerNom').text(nom);
            });

            function printImagenes(imagenes){

                let container = $('#contenedor-imagnes');

                if(imagenes.length < 100){

                    // Crear el primer div col-6
                    let firstDiv = $('<div>').addClass('col-sm-6 col-12 pt-1 pe-1 px-0 my-2');
                    let firstLink = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos');
                    let firstImage = $('<img>').addClass('object-fit-fill shadow size-img rounded-start').attr('src', imagenes[0].url).attr('alt', 'entrada').attr('id', 'frontCasa');
                    firstLink.append(firstImage);
                    firstDiv.append(firstLink);

                    let secondDiv = $('<div>').addClass('col-sm-6 col-12 pt-1 px-0 ps-1 my-2').attr('id','img-hide');
                    let secondLink = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos');
                    let secondImage = $('<img>').addClass('object-fit-fill shadow size-img rounded-end').attr('src', imagenes[1].url).attr('alt', 'entrada');
                    secondLink.append(secondImage);
                    secondDiv.append(secondLink);

                    // Añadir los divs al contenedor principal
                    container.append(firstDiv);
                    container.append(secondDiv);

                }else if(imagenes.length === 1){
                    // Crear col-12
                    let firstDiv = $('<div>').addClass('col-12 pt-1 px-0 my-2 me-2');
                    let firstLink = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos');
                    let firstImage = $('<img>').addClass('object-fit-cover shadow size-img rounded w-100').attr('src', imagenes[0].url).attr('alt', 'entrada').attr('id', 'frontCasa');
                    firstLink.append(firstImage);
                    firstDiv.append(firstLink);

                    container.append(firstDiv);
                }else {
                    $('#contenedor-imagnes').css('display', 'none');

                }
                // Agregar evento de clic a las imágenes
                $('img').click(function () {
                    $('#contenedor-imagnes #fotos').modal('show'); // Mostrar el modal al hacer clic en cualquier imagen
                });
            }

            resizeImage();
        })

        //Carousel
        $("#owl-example1").owlCarousel({
            margin:10,
            items:3,
        });
    });

</script>
</body>
</html>
