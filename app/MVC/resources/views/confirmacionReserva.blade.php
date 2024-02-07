@extends('layouts.plantilla')

@section('content')

    <main class="container-fluid d-flex justify-content-center">
        <div class="container-sm">
            <div class="col-12 row border-bottom border-black mt-4 ">
                <div class="col-7 row">
                    <button type="button" class="col-1 border-0 bg-white mb-3 text-end" >
                        <a href="{{route('principal')}}" class="text-dark ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>
                        </a>
                    </button>
                    <h1 class="col-10 mb-4">Confirmación de reserva</h1>
                </div>
            </div>
            <div class="col-12">
                <h4>Tu reserva</h4>
            </div>
            <form>
                @csrf
                <label for="entrada">Fecha entrada</label>
                <input id="entrada" name="entrada" value="">
                <label for="salida">Fecha salida</label>
                <input id="salida" name="salida" value="">
                <label for="personas">Huéspedes</label>
                <input id="personas" name="personas" value="">
                @isset($datosReserva['limpieza'])
                    <label for="limpieza">Limpieza</label>
                    <input id="limpieza" name="limpieza" value="">
                @endisset
                @isset($datosReserva['mascotas'])
                    <label for="limpieza">Mascotas</label>
                    <input id="limpieza" name="limpieza" value="">
                @endisset
                <label for="total">Total</label>
                <input id="total" name="total" value="">
            </form>
        </div>
    </main>

@endsection
