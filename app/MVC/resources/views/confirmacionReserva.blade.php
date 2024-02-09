@extends('layouts.plantillaFormularios');

@section('url')
    {{route('principal')}}
@endsection
@section('title','Confirmación de reserva')

@section('content')
            <div class="col-12 my-4">
                <h4>Tu reserva</h4>
            </div>
            <form method="post" action="{{route('reserva.store')}}" class="d-flex flex-column gap-3">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-10 mt-4 mb-3">
                        <h4>Tu reserva</h4>
                    </div>
                </div>
    <form class="d-flex flex-column gap-3">
        @csrf
        <div class="row justify-content-center">
            <div class="col-5">
                <label for="entrada">Fecha entrada</label>
                <input id="entrada" name="entrada" class="form-control " value="{{$datosReserva['from']}}" readonly>
            </div>
            <div class="col-5">
                <label for="salida">Fecha salida</label>
                <input id="salida" name="salida" class="form-control" value="{{$datosReserva['to']}}" readonly>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5">
                <label for="personas">Huéspedes</label>
                <input id="personas" name="personas" class="form-control" value="{{$datosReserva['personas']}}" readonly>
            </div>
            <div class="col-5">
                @if(isset($datosReserva['limpieza']))
                    <label for="limpieza">Limpieza</label>
                    <input id="limpieza" name="limpieza" class="form-control" value="{{$datosReserva['limpieza']}}€" readonly>
                @elseif(!isset($datosReserva['limpieza']))
                    <label for="limpieza">Limpieza</label>
                    <input id="limpieza" name="limpieza" class="form-control" value="0€" readonly>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5">
                <label for="total">Detalles del precio</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['pd']}}€ x {{$datosReserva['days']}}dies" readonly>
            </div>
            <div class="col-5">
                <label for="total">Total</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['ptotal']}}" readonly>
            </div>
        </div>
        @isset($datosReserva['mascotas'])
        <input type="text" name="mascotas" value="{{$datosReserva['mascotas']}}" hidden>
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="col-5">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked disabled>
                        <label class="form-check-label" for="flexCheckDefault">Mascotas</label>
                    </div>
                </div>
            </div>

        @endisset

        <!-- Datos que se tiene que enviar a la bd pero no se tienen que ver -->
        <input type="text" name="titol" value="{{$datosReserva['titol']}}" hidden>
        <input type="text" name="days" value="{{$datosReserva['days']}}" hidden>
        <input type="text" name="frombd" value="{{$datosReserva['frombd']}}" hidden>
        <input type="text" name="tobd" value="{{$datosReserva['tobd']}}" hidden>

        <div class="row justify-content-center">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="col-lg-1 col-sm-2 col-3 btn bg-primary bg-opacity-25 border border-dark mt-3 mb-4">Reservar</button>
            </div>
        </div>
    </form>
@endsection

