
        <h2 class="fs-4" id="desc"></h2>
        <p>
            {{$personas}} {{__('Personas')}} - {{$cantidadDormitorios}} {{__('Dormitorios')}} - {{$camas}} {{__('Camas')}} - {{$baños->quantitat}} {{__('Baño')}}
        </p>
        <input type="hidden" id="nPersones" value="{{$personas}}">
    <div id="normas-casa">
        <div class="border-bottom border-dark">
            <h3 class="fs-5">{{__('Normas de la casa')}}</h3>
            <ul class="body-color list-group list-group-flush">
                @foreach($normas as $norma)
                    @if($norma->clau === 'hora_entrada')
                        <li class="list-group-item">{{__('Horario de llegada')}}: {{$norma->valor}}</li>
                    @elseif($norma->clau === 'hora_salida')
                        <li class="list-group-item">{{__('Salida antes de las')}}: {{$norma->valor}}</li>
                    @elseif($norma->clau === 'mascotas')
                        @if($norma->valor === 'No')
                            <li class="list-group-item">{{__('No se admiten mascotas')}}</li>
                            <input type="hidden" id="permitirMascotas" value="No">
                        @else
                            <li class="list-group-item">{{__('Se admiten mascotas')}}</li>
                            <input type="hidden" id="permitirMascotas" value="Si">
                        @endif
                    @elseif($norma->clau === 'visitas')
                        @if($norma->valor === 'No')
                            <li class="list-group-item">{{__('No se admiten visitas')}}</li>
                        @else
                            <li class="list-group-item">{{__('Se admiten visitas')}}</li>
                        @endif
                    @elseif($norma->clau === 'fiestas')
                        @if($norma->valor === 'No')
                            <li class="list-group-item">{{__('No se admiten fiestas')}}</li>
                        @else
                            <li class="list-group-item">{{__('Se admiten fiestas')}}</li>
                        @endif
                    @endif
                @endforeach
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
                    <li class="list-group-item">{{$servicio->servicios->nom}} @if($servicio->quantitat !== 1) x {{$servicio->quantitat}} @endif</li>
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

