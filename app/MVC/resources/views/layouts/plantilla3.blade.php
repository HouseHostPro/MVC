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
    @section('titol','Cas Concos')
    @include('components.header')
    <!-- Modal -->
    <div class="modal fade" id="idiomes" tabindex="0"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Idiomas')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <form class="d-flex justify-content-between" >
                                @include('language_switcher')
                                <!--<button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Catalan</button>
                                <button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Castellano</button>
                                <button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Inglés</button>
                                <button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Aleman</button>-->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cerrar')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div></div>
    <main class="container-fluid d-flex justify-content-center" >
        <div id="container-principal" class="container-sm" >

            @yield('content')
        </div>
    </main>
</div>
@if(request()->is('/'))
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
                    $('#frontCasa').addClass('full-width rounded-end');

                } else {
                    // Mostrar las imágenes en las columnas col-6
                    $('#img-hide').show();
                    // Eliminar la clase que ajusta el tamaño de la imagen firstImage
                    $('#frontCasa').removeClass('full-width rounded-end');

                }
            }

            $(window).resize(resizeImage);

            let container = $('#contenedor-imagnes');

            // Crear el primer div col-6
            let firstDiv = $('<div>').addClass('col-sm-6 col-12 pt-1 px-0 my-2');
            let firstLink = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos');
            let firstImage = $('<img>').addClass('object-fit-fill shadow size-img rounded-start').attr('src', 'img/frontCasa.webp').attr('alt', 'entrada').attr('id', 'frontCasa');
            firstLink.append(firstImage);
            firstDiv.append(firstLink);

            let secondDiv = $('<div>').addClass('col-6 px-0 mt-3 ps-2').attr('id','img-hide');
            let secondLink = $('<a>').attr('href', '').attr('data-bs-toggle', 'modal').attr('data-bs-target', '#fotos');
            let secondImage = $('<img>').addClass('object-fit-fill shadow size-img rounded-end').attr('src', 'img/dormitori1.webp').attr('alt', 'entrada').attr('id', 'frontCasa');
            secondLink.append(secondImage);
            secondDiv.append(secondLink);

            // Añadir los divs al contenedor principal
            container.append(firstDiv);
            container.append(secondDiv);

            // Agregar evento de clic a las imágenes
            $('img').click(function () {
                $('#fotos').modal('show'); // Mostrar el modal al hacer clic en cualquier imagen
            });

            resizeImage();
        })


        //Formulario de reserva
        //Para poner la fecha de entrada, y en caso de haber puesto primero la de salida llamar a la función pintar
        $('#from').change(function() {
            startDate = $(this).
            datepicker('getDate');
            $("#to").
            datepicker("option", "minDate", startDate);
            if($('#to').val() !== ""){

                pintarprecioReserva();
            }

        })

        //Para pponer la fecha de salida, y en caso de haber puesto primero la de entrada llamar a la función pintar
        $('#to').change(function() {
            endDate = $(this).
            datepicker('getDate');
            $("#from").
            datepicker("option", "maxDate", endDate);
            if($('#from').val() !== ""){

                pintarprecioReserva();
            }

        })

        //Pinta los precios del coste de los dias reservados, limpieza y el total
        function pintarprecioReserva(){

            //Calcular días de diferencia entre fecha entrada y salida
            let entrada = new Date($('#entrada').val());
            let salida = new Date($('#sortida').val());
            let diffMs = Math.abs(salida - entrada);
            let diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));

            if(diffDays > 0){
                $('#divpxn').prop("hidden",false);
                let preuTotal = 150*diffDays;
                $('#pxn').text(150 + "€ x " + diffDays + " noches");
                $('#pxnt').val(preuTotal + "€");
                $('#ptotal').val(preuTotal + "€");
                $('#days').val(diffDays);
                $('#form-casa').css('height','31%');
            }
        }
        //Carousel
        $("#owl-example1").owlCarousel({
            margin:10,
            items:3,
        });
    });

</script>
</body>
</html>