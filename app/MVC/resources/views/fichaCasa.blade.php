@extends('layouts.plantilla')

@section('content')

    <!-- TODO posar tot lo referent a sa casa de forma dinàmica QUAN TENGUEM ES VIRTUALHOSTS -->

    <h1 class="mt-3">Cas Concos</h1>
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
                            5 {{__('Personas')}} - 3 {{__('Dormitorios')}} - 4 {{__('Camas')}} - 1 {{__('Baños')}}
                        </p>
                        <div>
                            <h3 class="fs-5">{{__('Normas de la casa')}}</h3>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{__('Horario de llegada')}}: 16:00 a 22:00</li>
                                <li class="list-group-item">Salida antes de las 14:00</li>
                                <li class="list-group-item">Máximo 6 huéspedes</li>
                                <li class="list-group-item">{{__('No se admiten mascotas')}}</li>
                                <li class="list-group-item border-bottom border-dark">{{__('No fumar')}}</li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="fs-5 mt-3">{{__('Habitaciones')}}</h3>
                            <div id="owl-example1" class="owl-carousel">
                                <div class="item mb-1">
                                    <div class="carousel-item active rounded border border-black shadow p-4" data-bs-interval="false">
                                        <div class="col-12 d-flex justify-content-center">
                                            <img src="img/cama-individual2.png" class="d-block w-25" alt="camas-individuales">
                                        </div>
                                        <div class="d-none d-md-block col-12">
                                            <h5 class="text-dark">{{__('Dormitorio')}} 1</h5>
                                            <p class="text-dark">2 {{__('camas individuales')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carousel-item active rounded border border-black shadow p-4" data-bs-interval="false">
                                        <div class="col-12 d-flex justify-content-center">
                                            <img src="img/cama-individual.png" class="d-block w-25" alt="cama-individual">
                                        </div>
                                        <div class="d-none d-md-block col-12">
                                            <h5 class="text-dark">{{__('Dormitorio')}} 2</h5>
                                            <p class="text-dark">1 {{__('cama individual')}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item me-1">
                                    <div class="carousel-item active rounded border border-black shadow p-4">
                                        <div class="col-12 d-flex justify-content-center">
                                            <img src="img/cama-doble.png" class="d-block w-25" alt="cama-doble">
                                        </div>
                                        <div class="d-none d-md-block col-12">
                                            <h5 class="text-dark">{{__('Dormitorio')}} 3</h5>
                                            <p class="text-dark">1 {{__('cama de matrimonio')}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-3 border-bottom border-dark">
                                <h3 class="fs-5 ">{{__('¿Qué hay en el alojamiento?')}}</h3>
                                <ul class="list-group list-group-flush">
                                    @php
                                    $count = 0;
                                    @endphp
                                    @foreach($servicios as $servicio)
                                        @if($count >= 5)
                                            @break
                                        @endif
                                        <li class="list-group-item">{{$servicio->Cservicios->nom}}</li>
                                            @php
                                                $count++;
                                            @endphp
                                    @endforeach
                                    <div class="col-4">
                                        <button type="button" class="btn bg-white border border-dark my-3" data-bs-toggle="modal" data-bs-target="#servicios">{{__('Mostrar más')}}</button>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="POST" action="{{ route('redsys') }}" class="col-4 border border-dark rounded shadow" style="height: 35%">
                    @csrf
                    <div class="mt-2 col-12 row mx-3">
                        <div class="col-2 px-0">
                            <input class="border-0 form-control p-0 text-end fs-5 bold" value="150" type="text" id="pd" name="pd" readonly>
                        </div>
                        <div class="col-8 px-0">
                            <p><span class="fs-5 bold">€</span> {{__('noche')}}</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center ">
                        <div class="col-12 row ">
                            <label class="custom-input col-12 col-xl-6" for="from">
                                <input class="border-1 form-control" type="text" id="from" name="from" autocomplete="off" required></br>
                                <span class="ph">{{__('Llegada')}}:</span>
                            </label>
                            <label class="custom-input col-12 col-xl-6" for="to">
                                <input class="border-1 form-control" type="text" id="to" name="to" autocomplete="off" required>
                                <span class="ph">{{__('Salida')}}:</span>
                            </label>
                        </div>
                        <div class="col-12 row justify-content-start my-3">
                            <div class="col-5 col-xl-4">
                                <label for="personas" class=" m-0" style="font-size: 18px">{{__('Huéspedes')}}:</label>
                            </div>
                            <button id="menos" type="button" class="col-2 col-xl-1  p-0 border-0 bg-white" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                </svg>
                            </button>
                            <div class="col-2">
                                <input id="personas" name="personas" class="form-control bg-white border-0 fs-5 text-center m-0 p-0" readonly required>
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
                                <input class="form-check-input" type="checkbox" value="true" name="mascotas" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault" style="font-size: 18px">{{__('Mascotas')}}</label>
                            </div>
                        </div>
                        <!-- Inputs con los formatos de hora del formato de la bbdd -->
                        <input type="text" id="titol" name="titol" value="Cas concos" hidden>
                        <input type="text" id="days" name="days" hidden>
                        <input type="text" id="entrada" name="frombd" hidden>
                        <input type="text" id="sortida" name="tobd" hidden>
                        <input type="text" id="usuari" name="usuari" hidden>
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="col-6 btn bg-primary bg-opacity-25 border border-dark mt-3 mb-4">{{__('Reservar')}}</button>
                    </div>
                    <div id="divpxn" class="col-12 row mx-2" hidden>
                        <div class="col-8">
                            <label id="pxn" for="pxnt" class="col-12 pt-1"></label>
                        </div>
                        <div class="col-4">
                            <input id="pxnt" name="pxn" class="bg-white border-0 form-control col-12 text-end" readonly>
                        </div>
                    </div>
                    <div id="divlimpiza" class="col-12 row mx-2" hidden>
                        <div class="col-4">
                            <label id="limpieza" for="limpiezat" class="col-12 pt-1"></label>
                        </div>
                        <div class="col-6">
                            <input id="limpiezat" name="limpieza" class="bg-white border-0 form-control col-12 text-end" readonly>
                        </div>
                    </div>
                    <div class="row mx-2 border-top">
                        <label for="ptotal" class="h5 col-8 my-3">{{__('Total')}}</label>
                        <input id="ptotal" name="ptotal" class="bg-white border-0 h5 col-4 text-end my-3" readonly>
                    </div>
                </form>
                <div id="calendari" class="col-7 ">
                    <div id="inline-picker" class="col-12 my-3"></div>
                </div>
                <div class="col-12 row border-top border-bottom border-dark d-flex justify-content-between">
                    <div class="col-12 text-end my-3">
                        <button type="button" class="btn bg-white btn-white border-0 text-black text-decoration-underline" data-bs-toggle="modal" data-bs-target="#crearComenatrio">{{__('Añadir comentario')}}</button>
                    </div>
                        <div class="modal-body row col-12 justify-content-between">
                            @foreach($comentarios as $comentario)
                            <div class="col-6 row mt-4">
                                <div class="col-2 me-md-2 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>
                                </div>
                                <div class="col-8 ps-0">
                                    <h5>{{$comentario->user->nom}}</h5>
                                    <p style="font-size: 12px">{{$comentario->user->ciutat->nom}}, {{$comentario->user->ciutat->pais->nom}}</p>
                                </div>
                                @auth
                                    @if($comentario->user->email === Auth::user()->email)
                                        <div class="col-1">
                                            <form method="post" action="{{route('comentario.delete')}}">
                                                @csrf
                                                <button type="submit" class="btn border-0 bg-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                @endauth
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
                                    <p class="text-truncate">
                                        {{$comentario->comentari}}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    <div class="col-4 ">
                        <button type="button" class="btn bg-white border border-dark my-3" data-bs-toggle="modal" data-bs-target="#comenarios">{{__('Mostrar más')}}</button>
                    </div>
                </div>
                <div class="col-12 row mt-5 mb-4 border-bottom border-dark" >
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
                <div class="col-12 col-xl-6 row">
                    <div class="col-xl-2 col-1 me-2 me-xl-0 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <div class="col-9 ps-0 d-flex align-self-center">
                        <h5>{{__('Anfitrión')}}: Lucas</h5>
                    </div>

                    <div class="col-12 mt-3">
                        <p>
                            La casita una monada, súper cómoda y acogedora.
                            Los alrededores preciosos.
                            Carlos es un anfitrión maravilloso, atento y nos facilitó todo mucho. Disfrutamos muchísimo.
                        </p>
                    </div>
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
                        <div class="col-2 text-center">
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
                            <p>
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

<script>

    $(document).ready(function() {

        let huespedes = 0;
        let totalRating;

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
                beforeShowDay: function( date) {

                    var selectable = true;
                    var title = '150€';
                    return [selectable, "", title];

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
                let preuTotal = $('#pd').val()*diffDays;
                $('#pxn').text($('#pd').val() + " x " + diffDays + " noches");
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
        var eventDates = {};
        eventDates[ new Date( '02/20/2024' )] = new Date( '02/22/2024' );
        eventDates[ new Date( '02/23/2024' )] = new Date( '02/28/2024' );
        console.log(eventDates);

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

                console.log(date);
                var selectable = true;
                var classname = "";
                var title = '150€';
                var highlight = eventDates[date];
                if( highlight ) {
                    return [selectable, "event", title];
                } else {
                    return [selectable, "", title];
                }
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

