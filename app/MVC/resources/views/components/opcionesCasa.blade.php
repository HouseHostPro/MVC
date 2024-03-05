
        <h2 class="fs-4" id="desc"></h2>
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
            @php
                $count = 0;
            @endphp

            @foreach($dormitorios as $dormitorio)
                @for($i = 0; $i < $dormitorio->quantitat; $i++ )
                    <div class="item mb-1 bg-white rounded">
                        <div class="carousel-item active rounded border border-black shadow p-4" data-bs-interval="false">
                            <div class="col-12 d-flex justify-content-center">

                                @foreach($urlsCamas as $url)
                                    @if($dormitorio->imatge_id === $url['id'])
                                        <img src="{{$url['url']}}" class="d-block w-50" alt="{{$dormitorio->imagenes->nom}}">
                                    @endif
                                @endforeach
                                @php
                                    $count++;
                                @endphp
                            </div>
                            <div class="d-none d-md-block col-12">
                                <h5 >{{__('Dormitorio')}} @php echo $count; @endphp </h5>
                                <p >{{$dormitorio->imagenes->nom}}</p>
                            </div>
                        </div>
                    </div>
                @endfor
            @endforeach
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
                    <li class="list-group-item">{{$servicio->servicios->nom}}</li>
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

