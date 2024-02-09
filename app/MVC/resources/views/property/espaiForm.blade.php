@php use Illuminate\Support\Facades\Session; @endphp
@extends('layouts/plantillaFormularios')

@section('url')
    {{route()}}
@endsection
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

@section('content')

    @if(Session::has('success'))
        <p>{{Session::get('success')}}</p>
    @endif

    <div class="d-flex flex-column align-items-center">
    <div class="container w-50 d-flex justify-content-between pt-5 pb-3">
        <h1>Editar espacios</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light border border-dark" data-toggle="modal" data-target="#exampleModal">
            Añadir espacio
        </button>

        <!-- Modal -->
    </div>

    <hr class="w-50 mx-auto">

        <div class="w-50">
            <button class="align-items-center btn btn-light">
            <span class="material-symbols-outlined">keyboard_backspace</span>
            <a href="">Volver</a>
            </button>
        </div>


    <div class="w-50 d-flex flex-column pt-5 @if(empty($espais)) border border-dashed px-5 py-5 @endif">
        @if(empty($espais))
            <p class="text-secondary text-center">No hay nada que mostrar. Por qué no añades un espacio?</p>
        @endif
    </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Launch modal</button>
        <!-- Modal -->
        <div class="modal" id="exampleModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body pb-4">
                        <strong><h4>Example of a Static Modal</h4></strong>

                        <form class="d-flex flex-column px-0 gap-2" method="post" action="{{route()}}">
                            @csrf
                            <div class="d-flex flex-column w-75">
                            <label for="tipo">Tipo</label>
                            <input id="tipo" type="text">

                            <label for="espacio_m2">Tamaño</label>
                            <input id="espacio_m2" class="w-50" type="text">
                            </div>

                            <div class="modal-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
