<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Esta és la página principal de la casa.">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('build/assets/plantilla1.css')}}">
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
        let windowWidth = $(window).width();

        //Resize de las imagenes y del form
        function resizeImageAndForm(){
            if (windowWidth < 540) {
                // Ocultar las imágenes en las columnas col-6
                $('#img-hide').hide();
                // Ajustar el tamaño de la imagen firstImage para ocupar todo el contenedor
                $('#frontCasa').addClass('full-width rounded');
                $('#form-casa').css('height', 'auto');


            } else {
                // Mostrar las imágenes en las columnas col-6
                $('#img-hide').show();
                // Eliminar la clase que ajusta el tamaño de la imagen firstImage
                $('#frontCasa').removeClass('full-width rounded-end');
                if ($('#permitirMascotas').val() === 'false') {
                    $('#mascotas').hide();
                    $('#form-casa').css('height', '22%');

                }else {

                    $('#form-casa').css('height', '26%');
                }

            }
        }
        const host = location.host;
        $.ajax({
            method: 'GET',
            url: `http://${host}/allImagesAjax/{{ $PROPIETAT_ID }}`
        }).done(function (imagenes) {
            printImagenes(imagenes)
        });

        $.ajax({
            method: 'GET',
            url: `http://www.househostpromp.me/findNomTraduit/{{ $PROPIETAT_ID }}`
        }).done(function (nom) {
            let svg = $('#headerNom').find("svg");
            svg.after(nom);
        });

        if ($('#permitirMascotas').val() === 'false') {
            $('#mascotas').hide();
            $('#form-casa').css('height', '24%');
        }

        function printImagenes(imagenes){


            let container = $('#contenedor-imagnes');

            if(imagenes.length >= 5){

                // Crear el primer div col-6
                let firstDiv = $('<div>').addClass('col-sm-6 col-12 pt-1 px-0 my-2 me-2');
                let firstLink = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos');
                let firstImage = $('<img>').addClass('object-fit-fill shadow size-img rounded-start').attr('src', imagenes[0].url).attr('alt', 'entrada').attr('id', 'frontCasa');
                firstLink.append(firstImage);
                firstDiv.append(firstLink);

                // Crear el segundo div col-6
                let secondDiv = $('<div>').addClass('col-6 row px-0 my-2');

                // Crear las dos columnas col-6 dentro del segundo div
                let col1 = $('<div>').addClass('col-6 p-1').addClass('img-hide');
                let col2 = $('<div>').addClass('col-6 p-1').addClass('img-hide');

                // Crear las imágenes y añadir al primer div col-6
                let img1 = $('<img>').addClass('object-fit-fill shadow size-img').attr('src', imagenes[1].url).attr('alt', 'dormitorio');
                let link1 = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos').append(img1);
                col1.append($('<div>').addClass('col-12 padd-img ms-2').append(link1));

                let img2 = $('<img>').addClass('object-fit-fill shadow size-img').attr('src', imagenes[2].url).attr('alt', 'baño');
                let link2 = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos').append(img2);
                col1.append($('<div>').addClass('col-12 ms-2').append(link2));

                // Crear las imágenes y añadir al segundo div col-6
                let img3 = $('<img>').addClass('object-fit-fill shadow size-img').attr('src', imagenes[3].url).attr('alt', 'baño').attr('id', 'radius-tr');
                let link3 = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos').append(img3);
                col2.append($('<div>').addClass('col-12 padd-img ms-2').append(link3));

                let img4 = $('<img>').addClass('object-fit-fill shadow size-img').attr('src', imagenes[4].url).attr('alt', 'piscina').attr('id', 'radius-br');
                let link4 = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos').append(img4);
                col2.append($('<div>').addClass('col-12 ms-2').append(link4));

                // Añadir las columnas al segundo div col-6
                secondDiv.append(col1);
                secondDiv.append(col2);

                // Añadir los divs al contenedor principal
                container.append(firstDiv);
                container.append(secondDiv);


            }else if(imagenes.length < 5){

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
            resizeImageAndForm();
        }

        //Pintar imagenes y model de imagenes
        $(function () {

            //Llama al método resize cuando cambia el width de la página
            function reResize() {

                let newWindowWidth = $(window).width();
                if (newWindowWidth !== windowWidth) {
                    windowWidth = newWindowWidth;

                    resizeImageAndForm();
                }
            }
            $(window).resize(reResize);

            resizeImageAndForm();
        })

        //Carousel

        $("#owl-example1").owlCarousel({
            margin:10,
            items:2,
        });
    });

</script>
</body>
</html>
