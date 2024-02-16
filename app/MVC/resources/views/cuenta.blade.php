@extends('layouts.plantilla')

@section('content')

    <h1 class="mt-3" >Cuenta</h1>
    <h4 class="h5">{{Auth::user()->nom}} {{Auth::user()->cognom1}} {{Auth::user()->cognom2}}, <span class="text-black-50 fs-5">{{Auth::user()->email}}</span></h4>
    <div class="row col-12 mt-5">
        <div class="row col-12 justify-content-around" >
            <a class="col-5 text-decoration-none text-black" href="{{ route('user.register') }}" >
                <div class="shadow rounded p-3 h-100">
                    <h5>Información personal</h5>
                    <p>Tus datos personales</p>
                </div>
            </a>
            <a class="col-5 text-decoration-none text-black" href="{{route('property.properties')}}" >
                <div class="shadow rounded p-3 h-100">
                    <h5>Propiedades</h5>
                    <p>Todas tus propiedades</p>
                </div>
            </a>
        </div>
        <div class="row col-12 justify-content-around mt-4">
            <a class="col-5 text-decoration-none text-black" href="{{route('reservas')}}" >
                <div class="shadow rounded p-3 h-100">
                    <h5>Reservas</h5>
                    <p>Todas tus reservas</p>
                </div>
            </a>
            <a class="col-5 text-decoration-none text-black" href="{{route('comentarios')}}" >
                <div class="shadow rounded p-3 h-100">
                    <h5>Comentarios</h5>
                    <p> Todos tus comentarios</p>
                </div>
            </a>
        </div>
        @auth
            @foreach($user->rol as $rol)
                @if($rol->Rrol->nom === 'PROPIETARI' || $rol->Rrol->nom === 'ADMINISTADOR')
                    <div class="row col-12 justify-content-around mt-4">
                        <a class="col-5 text-decoration-none text-black" href="{{route('historialReservas')}}" >
                            <div class="shadow rounded p-3 h-100">
                                <h5>Historial de reservas</h5>
                                <p> Todas tus reservas</p>
                            </div>
                        </a>
                        <a class="col-5"></a>
                    </div>
                @endif
            @endforeach
        @endauth
    </div>

@endsection
