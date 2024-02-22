@extends('layouts.plantilla1')

@section('content')

    <h1 class="mt-3">Cas Concos</h1>
    @include('components.imagenesCasa')
    <div id="contenedor-principal-casa" class="col-12 mt-sm-5 mt-sm-4 mt-1 justify-content-between row ms-sm-0 ms-1">
                <div id="opciones-casa">
                    @include('components.opcionesCasa')
                </div>
                <form id="form-casa" method="POST" action="{{ route('redsys') }}">
                    @csrf
                   @include('components.formCasa')
                </form>
                <div id="calendari-casa">
                    <div id="inline-picker" class="col-12 my-3"></div>
                </div>
                <div id="comentario-casa" >
                   @include('components.comentarioCasa')
                </div>
                <div id="mapa-casa">
                    <div class="col-12">
                        <h4>{{__('¿Dónde me voy a quedar?')}}</h4>
                    </div>
                    <div id="containerMap" class="mt-4">
                        <div id="map" class="container-sm"></div>
                    </div>
                    <div class="col-12 my-4">
                        <h5>Binissalem Mallorca</h5>
                    </div>
                </div>
                <div class="col-12 col-xl-5 row order-last">
                    @include('components.anfitrionCasa')
                </div>
            </div>

    <!-- Modals -->
    <!-- Ver Comentarios -->
    <div class="modal fade" id="comenarios" tabindex="-1" aria-labelledby="comment" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comment">Comentarios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @foreach($comentarios as $comentario)
                <div class="modal-body row col-12">
                    <div class="col-12 col-xl-6 row mt-4">
                        <div class="col-sm-2 col-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </div>
                        <div class="col-9 ps-0">
                            <h5>{{$comentario->user->nom}}</h5>
                            <p style="font-size: 12px">{{$comentario->user->ciutat->nom}}, {{$comentario->user->ciutat->pais->nom}}</p>
                        </div>
                        <div class="col-12 rating-container" data-rating="{{$comentario->puntuacio}}">
                            <div class="rating" >
                                <span class="star" data-rating="1">&#9733;</span>
                                <span class="star" data-rating="2">&#9733;</span>
                                <span class="star" data-rating="3">&#9733;</span>
                                <span class="star" data-rating="4">&#9733;</span>
                                <span class="star" data-rating="5">&#9733;</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p >
                                {{$comentario->comentari}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
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

    <!-- Ver todos los servicios -->
    <div class="modal fade" id="servicios" tabindex="-1" aria-labelledby="tServicios" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tServicios">Servicios</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3">
                        <ul class="list-group list-group-flush">
                            @foreach($servicios as $servicio)
                                <li class="list-group-item">{{$servicio->Cservicios->nom}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ver todos los normas -->
    <div class="modal fade" id="normas" tabindex="-1" aria-labelledby="tNormas" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tNormas">Normas de la casa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3">
                        <ul class="list-group list-group-flush">
                            @foreach($servicios as $servicio)
                                <li class="list-group-item">{{$servicio->Cservicios->nom}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ver todos las fotos -->
    <div class="modal fade" id="fotos" tabindex="-1" aria-labelledby="vFotos" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vFotos">Fotos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  d-flex justify-content-center">
                    <div class="row col-12">
                        <div class="col-6 mb-2 pe-1 ">
                            <img class="object-fit-fill shadow size-img rounded-start" src="img/dormitori1.webp" alt="dormitorio">
                        </div>
                        <div class="col-6 mb-2 ps-1 ">
                            <img class="object-fit-fill shadow size-img rounded-end" src="img/bany1.webp" alt="dormitorio">
                        </div>
                        <div class="col-6 mb-2 pe-1 ">
                            <img class="object-fit-fill shadow size-img rounded-start" src="img/dormitori1.webp" alt="dormitorio">
                        </div>
                        <div class="col-6 mb-2 ps-1 ">
                            <img class="object-fit-fill shadow size-img rounded-end" src="img/bany1.webp" alt="dormitorio">
                        </div>
                        <div class="col-6 mb-2 pe-1 ">
                            <img class="object-fit-fill shadow size-img rounded-start" src="img/dormitori1.webp" alt="dormitorio">
                        </div>
                        <div class="col-6 mb-2 ps-1 ">
                            <img class="object-fit-fill shadow size-img rounded-end" src="img/bany1.webp" alt="dormitorio">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

    $(document).ready(function() {

        let huespedes = 0;
        let totalRating;

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
                beforeShowDay: function( date) {

                    const string = jQuery.datepicker.formatDate('dd/mm/yy', date);
                    //console.log([dates.indexOf(string) === -1]);
                    var selectable = true;
                    var title = '150€';
                    var highlight = [dates.indexOf(string) === -1];
                    if( highlight ) {
                        return [selectable, "", title];
                    } else {
                        return [selectable, "", title];
                    }

                }
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
                beforeShowDay: function( date) {

                var selectable = true;
                var title = '150€';

                return [selectable, "", title];

            }
            });
        });

        $('#from').change(function() {
            startDate = $(this).
            datepicker('getDate');
            $("#to").
            datepicker("option", "minDate", startDate);
            if($('#to').val() !== ""){

                pintarprecioReserva();
            }

        })

        //Cuando se ponga la fecha de salida se
        $('#to').change(function() {
            endDate = $(this).
            datepicker('getDate');
            $("#from").
            datepicker("option", "maxDate", endDate);
            if($('#from').val() !== ""){

                pintarprecioReserva();
            }

        })

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
                $('#pxnt').val(preuTotal);
                $('#ptotal').val(preuTotal);
                $('#days').val(diffDays);
            }
        }

        $('#menos').on('click',function (){

            if(huespedes === 1){

                huespedes--;
                $('#personas').val("");
                $('#menos').prop("disabled",true);
            }else {
                huespedes--;
                $('#personas').val(huespedes);
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
        //Array para señalar los dias que no estan disponibles
        const dates = ['02/20/2024','02/21/2024','02/22/2024','02/23/2024'];

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
            disabled:true,
            beforeShowDay: function( date) {

                const string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                return jQuery.inArray(string, dates) == -1
                    ? [true, '', '150€']
                    : [true, 'event', '150€'];

            }
        });

        $(window).resize(function() {
            adjustNumberOfMonths();
        });

        adjustNumberOfMonths();

        //Rating

        //Mostrar estrellas asignadas de cada usuario
        $('.rating-container').each(function(index) {
            var $container = $(this);
            var ratingValue = $container.attr('data-rating');
            activateStars($container,ratingValue);
        });

        function activateStars($container, ratingValue) {
            $container.find('.star').removeClass('active');
            $container.find('.star').each(function() {
                if ($(this).attr('data-rating') <= ratingValue) {
                    $(this).addClass('active');
                }
            });
        }
        //Asignar estrellas para añadir un comentario
        $('.starE').click(function() {
            var rating = $(this).attr('data-rating');
            $('.starE').removeClass('active');
            $('.starE').each(function() {
                if ($(this).attr('data-rating') <= rating) {
                    $(this).addClass('active');
                }
            });
            totalRating = $('.starE.active').length;
            $('#rating').val(totalRating);
        });

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

