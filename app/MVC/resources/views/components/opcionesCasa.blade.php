
        <h2 class="fs-4">Casa Rural en Binissalem Mallorca</h2>
        <p>
            5 {{__('Personas')}} - 3 {{__('Dormitorios')}} - 4 {{__('Camas')}} - 1 {{__('Baños')}}
        </p>
    <div id="normas-casa">
        <div class="border-bottom border-dark">
            <h3 class="fs-5">{{__('Normas de la casa')}}</h3>
            <ul class="body-color list-group list-group-flush">
                <li class="list-group-item">{{__('Horario de llegada')}}: 16:00 a 22:00</li>
                <li class="list-group-item">{{__('Salida antes de las')}} 14:00</li>
                <li class="list-group-item">{{__('Máximo')}} 6 {{__('huéspedes')}}</li>
                <li class="list-group-item">{{__('No se admiten mascotas')}}</li>
                <li class="list-group-item ">{{__('No fumar')}}</li>
                <div class="col-sm-4 col-5">
                    <button type="button" class="btn bg-white border border-dark my-3" data-bs-toggle="modal" data-bs-target="#normas">{{__('Mostrar más')}}</button>
                </div>
            </ul>
        </div>
    </div>
    <div id="carousel-casa">
        <h3 class="fs-5 mt-3">{{__('Habitaciones')}}</h3>
        <div id="owl-example1" class="owl-carousel">
            <div class="item mb-1 bg-white">
                <div class="carousel-item active rounded border border-black shadow p-4" data-bs-interval="false">
                    <div class="col-12 d-flex justify-content-center">
                        <img src="img/cama-individual2.png" class="d-block w-50" alt="camas-individuales">
                    </div>
                    <div class="d-none d-md-block col-12">
                        <h5 class="text-dark">{{__('Dormitorio')}} 1</h5>
                        <p class="text-dark">2 {{__('camas individuales')}}</p>
                    </div>
                </div>
            </div>
            <div class="item bg-white">
                <div class="carousel-item active rounded border border-black shadow p-4" data-bs-interval="false">
                    <div class="col-12 d-flex justify-content-center">
                        <img src="img/cama-individual.png" class="d-block w-50" alt="cama-individual">
                    </div>
                    <div class="d-none d-md-block col-12">
                        <h5 class="text-dark">{{__('Dormitorio')}} 2</h5>
                        <p class="text-dark">1 {{__('cama individual')}}</p>
                    </div>
                </div>
            </div>
            <div class="item me-1 bg-white">
                <div class="carousel-item active rounded border border-black shadow p-4">
                    <div class="col-12 d-flex justify-content-center">
                        <img src="img/cama-doble.png" class="d-block w-50" alt="cama-doble">
                    </div>
                    <div class="d-none d-md-block col-12">
                        <h5 class="text-dark">{{__('Dormitorio')}} 3</h5>
                        <p class="text-dark">1 {{__('cama de matrimonio')}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="servicios-casa">
        <div class="border-bottom border-dark">
            <h3 class="fs-5 ">{{__('¿Qué hay en el alojamiento?')}}</h3>
            <ul class="body-color list-group list-group-flush">
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
                <div class="col-sm-4 col-5">
                    <button type="button" class="btn bg-white border border-dark mb-3" data-bs-toggle="modal" data-bs-target="#servicios">{{__('Mostrar más')}}</button>
                </div>
            </ul>
        </div>
    </div>

