@extends('layouts.plantilla')

@section('content')


    <main class="container">
        <h1 class="h2 mt-3">Cas Concos</h1>
        <section class="bg-warning bg-opacity-25 pt-3 my-4 rounded">
            <div class="container overflow-hidden">
                <div class="row bsb-project-1-grid">
                    <div class="col-12 col-lg-6 bsb-project-1-item">
                        <figure class="rounded rounded-4 order-0 overflow-hidden bsb-overlay-hover">
                            <a href="#!">
                                <img class="img-fluid shadow" src="img/frontCasa.webp" alt="entrada">
                            </a>
                        </figure>
                    </div>
                    <div class="col-12 col-lg-3 bsb-project-1-item">
                        <div class="col-12  bsb-project-1-item">
                            <figure class="rounded rounded-4 order-1 overflow-hidden bsb-overlay-hover">
                                <a href="#!">
                                    <img class="img-fluid shadow" src="img/dormitori1.webp" alt="dormitorio">
                                </a>
                            </figure>
                        </div>
                        <div class="col-12 bsb-project-1-item">
                            <figure class="rounded rounded-4 order-2 overflow-hidden bsb-overlay-hover">
                                <a href="#!">
                                    <img class="img-fluid shadow" src="img/bany1.webp" alt="baño">
                                </a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 bsb-project-1-item">
                        <div class="col-12 bsb-project-1-item">
                            <figure class="rounded rounded-4 order-3 overflow-hidden ">
                                <a href="#!">
                                    <img class="img-fluid shadow" src="img/bany1.webp" alt="baño">
                                </a>
                            </figure>
                        </div>
                        <div class="col-12  bsb-project-1-item">
                            <figure class="rounded rounded-4 order-4 overflow-hidden bsb-overlay-hover">
                                <a href="#!">
                                    <img class="img-fluid shadow" src="img/piscina.webp" alt="piscina">
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                        <img src="img/cama-individual2.png" class="d-block w-50" alt="camas-individuales">
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
                                        <img src="img/cama-individual.png" class="d-block w-50" alt="cama-individual">
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
                                        <img src="img/cama-doble.png" class="d-block w-50" alt="cama-doble">
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
            <div class="col-4 border border-dark rounded shadow"  style="height: 400px">
                <div class="mt-2">
                    <p><span class="fs-5 text">150€</span> noche</p>
                </div>
                <div class="border-gray-200 border rounded">
                    <div class="mb-2 mt-3 ms-2">
                        <label for="llegada" class="bold m-0">Llegada</label>
                        <input type="date" id="llegada" name="llegada">
                    </div>
                    <div class="my-2 ms-2">
                        <label for="salida" class="bold m-0">Salida</label>
                        <input type="date" id="salida" name="salida">
                    </div>
                    <div class="mt-2 mb-3 ms-2">
                        <label for="personas" class="bold m-0">Huéspedes</label>
                        <input type="number" id="personas" name="personas">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                <button type="button" class="col-6 btn bg-primary bg-opacity-25 border border-dark my-3">Reservar</button>
                </div>
            </div>
        </div>
    </main>
<script>
    $(document).ready(function() {
        $("#owl-example1").owlCarousel({
            margin:10,
            items:2,
            /*autoplay:true,
            autoplayTimeout:10000,

             */
        });
    });
    console.log("fa coses")
</script>
@endsection

