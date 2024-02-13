@extends('layouts.plantilla')

@section('content')

    <h1 class="mt-3" >Cuenta</h1>
    <h4 class="h5">{{Auth::user()->nom}} {{Auth::user()->cognom1}} {{Auth::user()->cognom2}}, <span class="text-black-50 fs-5">{{Auth::user()->email}}</span></h4>
    <div class="row col-12 my-4">
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
            <a class="col-5 text-decoration-none text-black" href="" >
                <div class="shadow rounded p-3 h-100">
                    <h5>Reservas</h5>
                    <p>Todas tus reservas</p>
                </div>
            </a>
            <a class="col-5 text-decoration-none text-black" href="" >
                <div class="shadow rounded p-3 h-100">
                    <h5>Comentarios</h5>
                    <p> Todos tus comentarios</p>
                </div>
            </a>
        </div>
        <!--
        @auth
            {{$user}}
            @foreach(Auth::user()->rol->Rrol->nom as $rol)
                @if($rol === 'ADMINISTRADOR')
                    <div class="row col-12 justify-content-start ms-4 mt-4">
                        <a class="col-5 text-decoration-none text-black" href="" >
                            <div class="shadow rounded p-3 h-100">
                                <h5>Historial de reservas</h5>
                                <p> Todas tus reservas</p>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        @endauth
        -->
    </div>

@endsection
