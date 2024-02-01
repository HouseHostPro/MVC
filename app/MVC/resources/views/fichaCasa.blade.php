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
                        <div id="carouselExampleDark" class="carousel carousel-dark slide border-bottom border-dark" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="false">
                                    <img src="img/cama-individual.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Dormitorio 1</h5>
                                        <p>2 camas individuales</p>
                                    </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="false">
                                    <img src="img/cama-individual.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Dormitorio 2</h5>
                                        <p>1 cama individual</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="img/cama-doble.jpg" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Dormitorio 3</h5>
                                        <p>1 cama de matrimo</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
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
                    <div id="quarter-year-view" class="md-quarter-year-view-cont"></div>
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

</script>
@endsection

