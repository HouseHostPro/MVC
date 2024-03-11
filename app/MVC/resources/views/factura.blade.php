@extends('layouts.plantillaFormularios')
@section('url')
    {{route('reservas', ['id' => $PROPIETAT_ID])}}
@endsection
@section('content')

<h1 class="mt-2">HouseHostPro</h1>
<div>
    <div class="col-12 text-center mt-3 mb-5 ">
        <h3>{{__('Factura')}}</h3>
    </div>
    <div class="row text-start mb-sm-3 mb-0">
        <div class="col-sm-3 col-12">
            <p class="fs-5 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('NºReserva')}}: <span class="fs-6 ">{{$factura->reserva_id}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Nombre propiedad')}}: <span class="fs-6 ">{{$factura->nom_propietat}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Nombre propietario')}}: <span class="fs-6 ">{{$factura->nom_propietari}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Correo electrónico')}}: <span class="fs-6 ">{{$factura->email}}</span></p>
        </div>
    </div>
    <div class="row d-flex text-start mb-sm-3 mb-0">
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Nombre cliente')}}: <span class="fs-6 ">{{$factura->nom_client}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Primer apellido')}}: <span class="fs-6 ">{{$factura->cognom1}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Segundo apellido')}}: <span class="fs-6 ">{{$factura->cognom2}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Teléfono')}}: <span class="fs-6 ">{{$factura->telefon}}</span></p>
        </div>
    </div>
    <div class="row d-flex text-start mb-sm-3 mb-0">
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Dirección')}}: <span class="fs-6 ">{{$factura->direccio}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Fecha inicio')}}: <span class="fs-6 ">{{$factura->data_inici}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Fecha fin')}}: <span class="fs-6 ">{{$factura->data_fi}}</span></p>
        </div>
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Precio total')}}: <span class="fs-6 ">{{$factura->preu_total}}</span></p>
        </div>
    </div>
    <div class="row d-flex text-start mb-sm-3 mb-0">
        <div class="col-sm-3 col-12">
            <p class="fs-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-circle-fill pb-1" viewBox="0 0 16 16">
                    <circle cx="8" cy="8" r="8"/>
                </svg>{{__('Nombre de acompañantes')}}: <span class="fs-6 ">{{$factura->numero_acompanyants}}</span></p>
        </div>
    </div>
</div>


@endsection
