@extends('layouts.plantilla' . $PLANTILLA)

@section('content')

    <h1 class="mt-3" >{{__('Cuenta')}}</h1>
    <h4 class="h5">{{Auth::user()->nom}} {{Auth::user()->cognom1}} {{Auth::user()->cognom2}}, <span class="text-black-50 fs-5">{{Auth::user()->email}}</span></h4>
    <div class="mt-5">
        <div class="row col-12 justify-content-around" >
            <a class="col-sm-5 col-12 text-decoration-none text-black" href="{{ route('user.register', ['id' => $PROPIETAT_ID]) }}" >
                <div class="shadow rounded p-3 h-100 bg-white">
                    <h5>{{__('Información personal')}}</h5>
                    <p>{{__('Tus datos personales')}}</p>
                </div>
            </a>
            <a class="col-sm-5 mt-sm-0 mt-4 col-12 text-decoration-none text-black" href="{{route('property.properties', ['id' => $PROPIETAT_ID])}}" >
                <div class="shadow rounded p-3 h-100 bg-white">
                    <h5>{{__('Propiedades')}}</h5>
                    <p>{{__('Todas tus propiedades')}}</p>
                </div>
            </a>
        </div>
        <div class="row col-12 justify-content-around mt-4">
            <a class="col-sm-5 col-12 text-decoration-none text-black" href="{{route('reservas')}}" >
                <div class="shadow rounded p-3 h-100 bg-white">
                    <h5>{{__('Reservas')}}</h5>
                    <p>{{__('Todas tus reservas')}}</p>
                </div>
            </a>
            <a class="col-sm-5 mt-sm-0 mt-4 col-12 text-decoration-none text-black" href="{{route('comentarios')}}" >
                <div class="shadow rounded p-3 h-100 bg-white">
                    <h5>{{__('Comentarios')}}</h5>
                    <p>{{__('Todos tus comentarios')}}</p>
                </div>
            </a>
        </div>
        @auth
            @foreach($user->rol as $rol)
                @if($rol->Rrol->nom === 'PROPIETARI' || $rol->Rrol->nom === 'ADMINISTADOR')
                    <div class="row col-12 justify-content-around mt-4 mb-3">
                        <a class="col-sm-5 col-12 text-decoration-none text-black" href="{{route('historialReservas')}}" >
                            <div class="shadow rounded p-3 h-100 bg-white">
                                <h5>{{__('Historial de reservas')}}</h5>
                                <p>{{__('Todas las reservas de tus propiedades')}}</p>
                            </div>
                        </a>
                        <a class="col-sm-5 mt-sm-0 mt-4 col-12 text-decoration-none text-black" href="{{route('allComentarios')}}" >
                            <div class="shadow rounded p-3 h-100 bg-white">
                                <h5>{{__('Historial de comentarios')}}</h5>
                                <p>{{__('Todos los comentarios de tus propiedades')}}</p>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        @endauth
    </div>

@endsection
