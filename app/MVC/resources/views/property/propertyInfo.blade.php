<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('build/assets/plantilla' . $PLANTILLA .'.css')}}">
    <script src="{{asset('build/assets/custom.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>
<body style="height: 93vh;">

    @include('sweetalert::alert')
    @foreach($traduccioNom as $nom)
        @if($nom -> lang === app()->getLocale())
            <?php $nomTraduit = $nom ?>
        @endif
    @endforeach

    @foreach($traduccioDesc as $desc)
        @if($desc -> lang === app()->getLocale())
                <?php $descTraduit = $desc ?>
        @endif
    @endforeach

    @section('titol','Cas Concos')
    @include('components.header')

    <main class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-sm-2 col-12 bg-primary bg-opacity-25 pb-sm-0 pb-3">
                <div class="text-center pb-3 text-dark mt-3">
                    <h4 class="d-sm-inline">{{__('Opciones de configuración')}}</h4>
                </div>
                <ul class="ms-2 mt-2 nav nav-pills flex-column gap-2" id="menu">
                    <li class="nav-item ps-3">
                        <a href="{{route('espai.espais', ['id' => $PROPIETAT_ID ,'prop_id' => $propietat -> id])}}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                            </svg>{{__('Espacios')}}
                        </a>
                    </li>
                    <li class="nav-item ps-3">
                        <a href="{{ route('property.normas', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id]) }}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                            </svg>{{__('Normas')}}
                        </a>
                    </li>
                    <li class="nav-item ps-3">
                        <a href="{{ route('property.gallery', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id]) }}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                            </svg>{{__('Galería')}}
                        </a>
                    </li>
                    <li class="nav-item ps-3">
                        <a href="{{route('property.service', ['id' => $PROPIETAT_ID ,'prop_id' => $propietat -> id])}}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                            </svg>{{__('Servicios')}}
                        </a>
                    </li>
                    <li class="nav-item ps-3">
                        <a href="{{route('property.calendar', ['id' => $PROPIETAT_ID ,'prop_id' => $propietat -> id])}}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                            </svg>{{__('Disponibilidad y precios')}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-10 col-12">
                <div class="row">
                    <div class="mt-4 col-12" >
                        <nav  style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" >
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $PROPIETAT_ID])}}">{{__('Principal')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $PROPIETAT_ID])}}">{{__('Cuenta')}}</a></li>
                                <li class="breadcrumb-item"><a href="{{route('property.properties', ['id' => $PROPIETAT_ID])}}">{{__('Propiedades')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $nomTraduit -> value }}</li>
                            </ol>
                        </nav>
                    </div>
                    <form method="post" action="{{ route('property.update', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id]) }}" class="col-12" >
                        @csrf
                        <input type="hidden" value="{{ $PROPIETAT_ID }}" name="casaId">
                        <div class="row">
                            <h2>{{__('Editar propiedad')}}</h2>
                            <div class="col-sm-4 col-12 ">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="img-fluid mt-4"  src="https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/large_jpg/_FI.jpg?1563747560" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-12">
                                <div class=" py-4">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">{{ $nomTraduit -> value }}</h4>
                                    </div>
                                    <div class="row mt-2 justify-content-between">
                                        <div class="col-sm-6">
                                            <label class="labels">{{__('Nombre')}}</label>
                                            <input type="text" name="nombre" class="form-control" value="{{ $nomTraduit -> value }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="labels">{{__('Plantilla')}}</label>
                                            <select class="form-select" name="plantilla" aria-label="Default select example">
                                                @foreach($plantillas as $plantilla)
                                                    @if($propietat->plantilla_id === $plantilla->id)
                                                    <option value="{{$plantilla->id}}" selected>{{$plantilla->nom}}</option>
                                                    @else
                                                        <option value="{{$plantilla->id}}">{{$plantilla->nom}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12">
                                            <label class="language-">{{__('Descripción')}}</label>
                                            <textarea class="form-control" name="descripcion">{{ $descTraduit -> value }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-6 col-12">
                                            <label class="labels">{{__('Ubicación')}}</label>
                                            <input id="ubi" name="ubi" type="text" class="form-control" placeholder="country" value="{{$propietat -> localitzacio}}">
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <label class="label">{{__('Ciutat')}}</label>
                                            <select class="form-control">
                                                @foreach($ciutats as $ciutat)
                                                    <option value="{{$ciutat -> id}}" @if($ciutat -> id === $propietat -> ciutat_id) selected @endif>{{$ciutat -> nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="nameCode" value="{{ $propietat -> nom }}" />
                                    <input type="hidden" name="descCode" value="{{ $propietat -> descripcio }}" />
                                    <input type="hidden" name="id" value="{{ $propietat -> id }}" />
                                    <div class=" col-12 row justify-content-center">
                                        <div class="mt-sm-5 mt-4 col-sm-6 text-center">
                                            <button class="btn btn-primary profile-button" type="submit">{{__('Guardar cambios')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="map" style="height: 380px" class="mb-4"></div>
                    </form>
                </div>
            </div>
        </div>

    </main>


    <script>

        $(document).ready(function (){

            let lat = $('#ubi').val().split(',')[0];
            let lng = $('#ubi').val().split(',')[1];

            const map = L.map('map').setView([lat, lng], 13);
            L.marker([lat, lng]).addTo(map);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            const circle = L.circle([lat, lng], {
                color: 'blue',
                fillColor: '#ADD8E6',
                fillOpacity: 0.5,
                radius: 50
            }).addTo(map);


            map.on('click', function(e) {
                lat = e.latlng.lat;
                lng = e.latlng.lng;
                $('#ubi').val(e.latlng.lat + ", " + e.latlng.lng);
            });

            let windowWidth = $(window).width();
            function resizeProperty() {


                if (windowWidth < 540) {

                    $('body').css('height','100vh')
                    $('ul').removeClass('ms-2');
                    $('#container').addClass('d-flex justify-content-center');

                } else {
                    $('body').css('height','93vh')
                    $('ul').addClass('ms-2');
                    $('#container').removeClass('d-flex justify-content-center');

                }
            }

                function reResize() {

                    let newWindowWidth = $(window).width();
                    if (newWindowWidth !== windowWidth) {
                        windowWidth = newWindowWidth;

                        resizeProperty();
                    }
                }
                $(window).resize(reResize);
                resizeProperty();


        })
    </script>
</body>
</html>
