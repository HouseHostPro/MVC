@extends('layouts.plantilla')

@section('content')
    <main class="container-fluid d-flex justify-content-center">
        <div class="container-fluid" style="width: 85%">
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
                <div class="col-6">
                    <h2 class="fs-4">Casa Rural en Calvia Malloca</h2>
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
                                <div class="item">
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
                <form class="col-4 border border-dark rounded shadow"  style="height: 500px">
                    <div class="mt-2">
                        <p><span class="fs-5 text">150€</span> noche</p>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 row ">
                            <label class="custom-input col-12 col-xl-6" for="from">
                                <input class="border-1" type="text" id="from" name="from"></br>
                                <span class="ph">Llegada:</span>
                            </label>
                            <label class="custom-input col-12 col-xl-6" for="to">
                                <input class="border-1" type="text" id="to" name="to">
                                <span class="ph">Salida:</span>
                            </label>
                        </div>
                        <div class="col-12 row justify-content-center">
                            <label class="custom-input col-12 col-xl-6" for="personas">
                                <input class="border-1" type="text" id="personas" name="personas" disabled>
                                <span class="ph">Huéspedes:</span>
                            </label>
                            <div class="custom-input col-12 col-xl-6 row justify-content-center">
                                <button id="menos" type="button" class="rounded-circle col-3 border-0 bg-white" disabled>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                    </svg>
                                </button>
                                <button id="mas" type="button" class="rounded-circle col-3 border-0 bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="form-check col-12">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Mascotas
                            </label>
                        </div>
                        <!-- Inputs con los formatos de hora del formato de la bbdd -->
                        <input type="text" id="entrada" hidden>
                        <input type="text" id="sortida" hidden>
                    </div>

                    <div class="d-flex justify-content-center">
                    <button type="button" class="col-6 btn bg-primary bg-opacity-25 border border-dark my-3">Reservar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<script>

    //Carousel
    $(document).ready(function() {

        let huespedes = 0;
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
                minDate: 0

            });
        });

        $(function() {
            $("#to").
            datepicker({
                dateFormat: "dd/mm/yy",
                altField:'#sortida',
                altFormat:'yy-mm-dd'

            });
        });

        $('#from').change(function() {
            startDate = $(this).
            datepicker('getDate');
            $("#to").
            datepicker("option", "minDate", startDate);
            console.log($('#entrada').val());
        })

        $('#to').change(function() {
            endDate = $(this).
            datepicker('getDate');
            $("#from").
            datepicker("option", "maxDate", endDate);
            console.log($('#sortida').val());

        })

        $('#menos').on('click',function (){

            if(huespedes === 1){

                $('#personas').val("");
                $('#menos').prop("disabled",true);
            }else {
                huespedes--;
                $('#personas').val(huespedes--);
            }
        })
        $('#mas').on('click',function (){

            huespedes++;
            $('#personas').val(huespedes);
            $('#menos').prop("disabled",false);
            console.log("entra");

        })
    });




</script>
@endsection

