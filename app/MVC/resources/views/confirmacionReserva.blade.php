@extends('layouts.plantillaFormularios');

@section('title','Confirmación de reserva')

@section('content')
            <div class="col-12 my-4">
                <h4>Tu reserva</h4>
            </div>
            <form>
                @csrf
                <label for="entrada">Fecha entrada</label>
                <input id="entrada" name="entrada" class="form-control " value="{{$datosReserva['from']}}" readonly>
                <label for="salida">Fecha salida</label>
                <input id="salida" name="salida" class="form-control" value="{{$datosReserva['to']}}" readonly>
                <label for="personas">Huéspedes</label>
                <input id="personas" name="personas" class="form-control" value="{{$datosReserva['personas']}}" readonly>
                @isset($datosReserva['limpieza'])
                    <label for="limpieza">Limpieza</label>
                    <input id="limpieza" name="limpieza" class="form-control" value="{{$datosReserva['limpieza']}}" readonly>
                @endisset
                @isset($datosReserva['mascotas'])
                    <label for="mascotas">Mascotas</label>
                    <input id="mascotas" name="mascotas" class="form-control" value="Si" readonly>
                @endisset
                <label for="total">Detalles del precio</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['pd']}}€ x {{$datosReserva['days']}}dies" readonly>
                <label for="total">Total</label>
                <input id="total" name="total" class="form-control" value="{{$datosReserva['ptotal']}}" readonly>

                <!-- Datos que se tiene que enviar a la bd pero no se tienen que ver -->
                <input type="text" name="mascotas" value="{{$datosReserva['mascotas']}}" hidden>
                <input type="text" name="days" value="{{$datosReserva['days']}}" hidden>
                <input type="text" name="frombd" value="{{$datosReserva['frombd']}}" hidden>
                <input type="text" name="tobd" value="{{$datosReserva['tobd']}}" hidden>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="col-2 btn bg-primary bg-opacity-25 border border-dark mt-3 mb-4">Reservar</button>
                </div>
            </form>
@endsection

