@extends('layouts.plantilla')

@section('content')
    <main class="container-fluid d-flex justify-content-center">
        <div class="container-sm" >
            <h1 class="h2 mt-3">Cas Concos</h1>
            <div class="container-fluid bg-light rounded row">
                <div class="col-6 pt-1 px-0 my-2 me-2">
                    <a href="#!">
                        <img  class="object-fit-fill shadow size-img rounded-start" src="img/frontCasa.webp" alt="dormitorio">
                    </a>
                </div>
                <div class="col-6 row px-0 my-2">
                    <div class="col-6 p-1">
                        <div class="col-12 padd-img ms-2">
                            <a href="#!">
                                <img class="object-fit-fill shadow size-img " src="img/dormitori1.webp" alt="dormitorio">
                            </a>
                        </div>
                        <div class="col-12 ms-2">
                            <a href="#!">
                                <img class="object-fit-fill shadow size-img " src="img/bany1.webp" alt="dormitorio">
                            </a>
                        </div>
                    </div>
                    <div class="col-6 p-1" >
                        <div class="col-12 padd-img ms-2">
                            <a href="#!">
                                <img id="radius-tr" class="object-fit-fill shadow size-img " src="img/bany1.webp" alt="dormitorio">
                            </a>
                        </div>
                        <div class="col-12 ms-2">
                            <a href="#!">
                                <img id="radius-br" class="object-fit-fill shadow size-img" src="img/piscina.webp" alt="dormitorio">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5 justify-content-between row">
                <div class="col-7">
                    <h2 class="fs-4">Casa Rural en Binissalem Mallorca</h2>
                    <div>
                        <p>
                            5 personas - 3 dormitorios - 4 camas - 1 baño
                        </p>
                        <div>
                            <h3 class="fs-5">Normas de la casa</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Horario de llegada: 16:00 a 22:00</li>
                                <li class="list-group-item">Salida antes de las 14:00</li>
                                <li class="list-group-item">Máximo 6 huéspedes</li>
                                <li class="list-group-item">No de admiten mascotas</li>
                                <li class="list-group-item border-bottom border-dark">No fumar</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="fs-5 mt-3">Habitaciones</h3>
                            <div id="owl-example1" class="owl-carousel">
                                <div class="item">
                                    <div class="carousel-item active rounded border border-black shadow p-4" data-bs-interval="false">
                                        <div class="col-12 d-flex justify-content-center">
                                            <img src="img/cama-individual2.png" class="d-block w-25" alt="camas-individuales">
                                        </div>
                                        <div class="d-none d-md-block col-12">
                                            <h5 class="text-dark">Dormitorio 1</h5>
                                            <p class="text-dark">2 camas individuales</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-item active rounded border border-black shadow p-4" data-bs-interval="false">
                                        <div class="col-12 d-flex justify-content-center">
                                            <img src="img/cama-individual.png" class="d-block w-25" alt="cama-individual">
                                        </div>
                                        <div class="d-none d-md-block col-12">
                                            <h5 class="text-dark">Dormitorio 2</h5>
                                            <p class="text-dark">1 cama individual</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item me-1">
                                    <div class="carousel-item active rounded border border-black shadow p-4">
                                        <div class="col-12 d-flex justify-content-center">
                                            <img src="img/cama-doble.png" class="d-block w-25" alt="cama-doble">
                                        </div>
                                        <div class="d-none d-md-block col-12">
                                            <h5 class="text-dark">Dormitorio 3</h5>
                                            <p class="text-dark">1 cama de matrimo</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <div class="mt-3 border-bottom border-dark">
                            <h3 class="fs-5 ">¿Que hay en el alojamiento?</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Piscina</li>
                                <li class="list-group-item">Cocina</li>
                                <li class="list-group-item">Aparcamiento gratuito</li>
                                <li class="list-group-item">Cafetera</li>
                                <li class="list-group-item ">Televisor</li>
                                <div class="col-4">
                                    <button type="button" class="btn bg-white border border-dark my-3">Mostrar más servicios</button>
                                </div>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('confirmacionReserva') }}" class="col-4 border border-dark rounded shadow" style="height: 35%">
                    @csrf
                    <div class="mt-2">
                        <p><span id="preu" class="fs-5 text">150€</span> noche</p>
                    </div>
                    <div class="row d-flex justify-content-center ">
                        <div class="col-12 row ">
                            <label class="custom-input col-12 col-xl-6" for="from">
                                <input class="border-1 form-control" type="text" id="from" name="from"></br>
                                <span class="ph">Llegada:</span>
                            </label>
                            <label class="custom-input col-12 col-xl-6" for="to">
                                <input class="border-1 form-control" type="text" id="to" name="to">
                                <span class="ph">Salida:</span>
                            </label>
                        </div>
                        <div class="col-12 row justify-content-start my-3">
                            <div class="col-5 col-xl-4">
                                <label for="personas" class=" m-0" style="font-size: 18px">Huéspedes:</label>
                            </div>
                            <button id="menos" type="button" class="col-2 col-xl-1  p-0 border-0 bg-white" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                </svg>
                            </button>
                            <div class="col-2">
                                <input id="personas" name="personas" class="form-control border-0 fs-5 text-center m-0 p-0">
                            </div>
                            <button id="mas" type="button" class="col-2 col-xl-1 p-0 border-0 bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle " viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg>
                            </button>
                        </div>
                        <div class="col-12 justify-content-start ms-3 my-xl-3 ">
                            <div class="form-check form-switch ps-5">
                                <input class="form-check-input" type="checkbox" value="" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault" style="font-size: 18px">Mascotas</label>
                            </div>
                        </div>
                        <!-- Inputs con los formatos de hora del formato de la bbdd -->
                        <input type="text" id="entrada" hidden>
                        <input type="text" id="sortida" hidden>
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="col-6 btn bg-primary bg-opacity-25 border border-dark mt-3 mb-4">Reservar</button>
                    </div>
                    <div id="divpxn" class="row mx-2" hidden>
                        <p id="pxn" class="col-8"></p>
                        <p id="pxnt" class="col-4 text-end"></p>
                    </div>
                    <div id="divlimpiza" class="row mx-2" hidden>
                        <p id="limpieza" class="col-8"></p>
                        <p id="limpiezat" class="col-4 text-end"></p>
                    </div>
                    <div class="row mx-2 border-top ">
                        <p class="h5 col-8 my-3">Total</p>
                        <p id="ptotal" class="h5 col-4 text-end my-3">0€</p>
                    </div>
                </form>
                <div id="calendari" class="col-7 ">
                    <div id="inline-picker" class="col-12 my-3"></div>
                </div>
                <div class="col-12 row border-top border-bottom border-dark d-flex justify-content-between">
                    <div class="col-12 col-xl-6 row mt-4">
                        <div class="col-2 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </div>
                        <div class="col-9 ps-0">
                            <h5>Mónica</h5>
                            <p style="font-size: 12px">Cataluña,España</p>
                        </div>
                        <div class="col-12 rating-container" data-rating="">
                            <div class="rating" >
                                <span class="star" data-rating="1">&#9733;</span>
                                <span class="star" data-rating="2">&#9733;</span>
                                <span class="star" data-rating="3">&#9733;</span>
                                <span class="star" data-rating="4">&#9733;</span>
                                <span class="star" data-rating="5">&#9733;</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>
                                La casita una monada, súper cómoda y acogedora.
                                Los alrededores preciosos.
                                Carlos es un anfitrión maravilloso, atento y nos facilitó todo mucho. Disfrutamos muchísimo.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-xl-6 row mt-4">
                        <div class="col-2 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </div>
                        <div class="col-9 ps-0">
                            <h5>Mónica</h5>
                            <p style="font-size: 12px">Cataluña,España</p>
                        </div>
                        <div class="col-12 rating-container" data-rating="">
                            <div class="rating" >
                                <span class="star" data-rating="1">&#9733;</span>
                                <span class="star" data-rating="2">&#9733;</span>
                                <span class="star" data-rating="3">&#9733;</span>
                                <span class="star" data-rating="4">&#9733;</span>
                                <span class="star" data-rating="5">&#9733;</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p>
                                La casita una monada, súper cómoda y acogedora.
                                Los alrededores preciosos.
                                Carlos es un anfitrión maravilloso, atento y nos facilitó todo mucho. Disfrutamos muchísimo.
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn bg-white border border-dark my-3">Mostrar más</button>
                    </div>
                </div>
                <div class="col-12 row my-5 border-bottom border-dark">
                    <div class="col-12">
                        <h4>¿Dónde me voy a quedar?</h4>
                    </div>
                    <div id="containerMap" class="mt-4">
                        <div id="map" class="container-sm"></div>
                    </div>
                    <div class="col-12 my-4">
                        <h5>Binissalem Mallorca</h5>
                    </div>
                </div>
                <div class="col-12 col-xl-6 row mt-4">
                    <div class="col-2 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <div class="col-9 ps-0">
                        <h5>Anfitrión: Lucas</h5>
                    </div>

                    <div class="col-12">
                        <p>
                            La casita una monada, súper cómoda y acogedora.
                            Los alrededores preciosos.
                            Carlos es un anfitrión maravilloso, atento y nos facilitó todo mucho. Disfrutamos muchísimo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>


    $(document).ready(function() {

        let huespedes = 0;
        let diffDays;
        let preuTotal;
        let totalRating;
        const oneDay = 24*60*60*1000;

        //Carousel
        $("#owl-example1").owlCarousel({
            margin:10,
            items:2,
            /*autoplay:true,
            autoplayTimeout:10000,

             */
        });

        //Date-picker
        $(function() {
            $("#from").
            datepicker({
                dateFormat: "dd/mm/yy",
                altField:'#entrada',
                altFormat:'yy-mm-dd',
                minDate: 0,
                firstDay:1,
                changeMonth:true,
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            });
        });

        $(function() {
            $("#to").
            datepicker({
                dateFormat: "dd/mm/yy",
                altField:'#sortida',
                altFormat:'yy-mm-dd',
                firstDay:1,
                changeMonth:true,
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            });
        });

        $('#from').change(function() {
            startDate = $(this).
            datepicker('getDate');
            $("#to").
            datepicker("option", "minDate", startDate);
        })

        $('#to').change(function() {
            endDate = $(this).
            datepicker('getDate');
            $("#from").
            datepicker("option", "maxDate", endDate);
            diffDays = Math.abs((parseInt($('#entrada').val().replaceAll("-","")) - parseInt($('#sortida').val().replaceAll("-",""))));
            $('#divpxn').prop("hidden",false);
            preuTotal = 167*diffDays;
            $('#pxn').text($('#preu').text() + " x " + diffDays + " noches");
            $('#pxnt').text(preuTotal + "€");
            $('#ptotal').text(preuTotal + "€");

        })

        $('#menos').on('click',function (){

            if(huespedes === 1){

                $('#personas').val("");
                $('#menos').val("disabled",true);
            }else {
                huespedes--;
                $('#personas').text(huespedes);
            }
        })
        $('#mas').on('click',function (){

            huespedes++;
            $('#personas').val(huespedes);
            $('#menos').prop("disabled",false);
        })

        //Calendar

        function adjustNumberOfMonths() {
            if ($(window).width() < 1140) {
                $('#inline-picker').datepicker('option', 'numberOfMonths', 1);
            } else {
                $('#inline-picker').datepicker('option', 'numberOfMonths', 2);
            }
        }


        var eventDates = {};
        eventDates[ new Date( '02/10/2024' )] = new Date( '02/12/2024' );
        eventDates[ new Date( '02/11/2024' )] = new Date( '02/05/2024' );

        $('#inline-picker').datepicker({
            controls: ['calendar'],
            display: 'inline',
            touchUi: true,
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            minDate: 0,
            numberOfMonths: 2,
            firstDay:1,
            changeMonth:true,
            beforeShowDay: function( date ) {
                var highlight = eventDates[date];
                if( highlight ) {
                    return [true, "event", 'Tooltip text'];
                } else {
                    return [true, '', ''];
                }
            }
        });

        $(window).resize(function() {
            adjustNumberOfMonths();
        });

        adjustNumberOfMonths();

        //Rating

        var ratings = [3, 4]; // Valores de estrellas para cada contenedor

        $('.rating-container').each(function(index) {
            var $container = $(this);
            var ratingValue = ratings[index]; // Obtener el valor del array

            activateStars($container, ratingValue);
        });

        function activateStars($container, ratingValue) {
            $container.find('.star').removeClass('active');
            $container.find('.star').each(function() {
                if ($(this).attr('data-rating') <= ratingValue) {
                    $(this).addClass('active');
                }
            });
        }

        //Map
        function adjustMap() {
            if ($(window).width() < 1140) {
                $('#map').datepicker('option', 'numberOfMonths', 1);
            } else {
                $('#map').datepicker('option', 'numberOfMonths', 2);
            }
        }

        var map = L.map('map').setView([39.68793, 2.84433], 13);
        var marker = L.marker([39.68793, 2.84433]).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var circle = L.circle([39.68793, 2.84433], {
            color: 'blue',
            fillColor: '#ADD8E6',
            fillOpacity: 0.5,
            radius: 50
        }).addTo(map);

    });

</script>
@endsection

