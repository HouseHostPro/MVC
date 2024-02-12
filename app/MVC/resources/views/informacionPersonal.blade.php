@extends('layouts.plantilla')

@section('content')
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información Personal</li>
        </ol>
    </nav>
    <h1 class="mt-3" >Información Personal</h1>
    <form>
        @csrf
        <div class="row justify-content-center">
            <div class="col-5">
                <label for="entrada">Nombre:</label>
                <input id="entrada" name="entrada" class="form-control " value="{{$datosReserva['from']}}" readonly>
            </div>
            <div class="col-5">
                <label for="salida">Primer Apellido;</label>
                <input id="salida" name="salida" class="form-control" value="{{$datosReserva['to']}}" readonly>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5">
                <label for="personas">Segundo Apellido:</label>
                <input id="personas" name="personas" class="form-control" value="{{$datosReserva['personas']}}" readonly>
            </div>
            <div class="col-5">
                <label for="personas">Correo Electrónico:</label>
                <input id="personas" name="personas" class="form-control" value="{{$datosReserva['personas']}}" readonly>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5">
                <label for="total">Número de teléfono</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['pd']}}€ x {{$datosReserva['days']}}dies" readonly>
            </div>
            <div class="col-5">
                <label for="total">Ciudad:</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['ptotal']}}" readonly>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-5">
                <label for="total">Número de teléfono</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['pd']}}€ x {{$datosReserva['days']}}dies" readonly>
            </div>
            <div class="col-5">
                <label for="total">Ciudad:</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['ptotal']}}" readonly>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-10 d-flex justify-content-end">
                <button type="submit" class="col-lg-1 col-sm-2 col-3 btn bg-primary bg-opacity-25 border border-dark mt-3 mb-4">Reservar</button>
            </div>
        </div>
    </form>

@endsection
