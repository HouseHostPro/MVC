@extends('layouts.plantilla')

@section('content')
        <form class="container-fluid d-flex flex-column px-0 align-items-center" method="post">
            @csrf
            <h1 class="py-5 px-2">{{__('Añadir propiedad')}}</h1>

            <div class="container d-flex flex-wrap bg-body-secondary border-2 col-7 py-4 px-4
            shadow-lg p-3 mb-5 bg-white rounded">
                <div class="form-group mb-1 w-50 p-2">
                    <label for="nombre">{{__('Nombre de la propiedad')}}</label>
                    <input id="nombre" required type="text" class="form-control" name="nombre_propiedad">
                </div>
                <div class="form-group mb-1 w-50 p-2">
                    <label for="cancelacion">{{__('Días de antelación para cancelar sin penalización')}}</label>
                    <input id="cancelacion" required type="number" class="form-control" name="cancelacion">
                </div>
                <div class="form-group mb-1 w-50 p-2">
                    <label for="ubicacion">{{__('Ubicación')}}</label>
                    <input id="ubicacion" required type="text" class="form-control" name="ubicacion">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="precio">{{__('Precio por noche')}}</label>
                    <input id="precio" required type="number" class="form-control" name="precio">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="precio_limpieza">{{__('Precio limpieza')}}</label>
                    <input id="precio_limpieza" required type="number" class="form-control" name="precio_limpieza">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="m2">{{__('Tamaño (m2)')}}</label>
                    <input id="m2" required type="text" class="form-control" name="m2">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="ciudad">{{__('Ciudad o municipio')}}</label>
                    <select id="ciudad" class="form-select" name="ciudad">
                        @foreach($ciutats as $ciutat)
                            <option value="{{$ciutat -> id}}">{{$ciutat -> nom}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group mb-1 w-50 p2 py-3">
                    <div class="d-flex flex-column">
                        <div class="d-flex px-4 gap-2">
                        <label for="hora_entrada">{{__('Hora de entrada')}}</label>
                        <input id="hora_entrada" required type="time" class="form-control w-50" name="hora_entrada">
                        </div>

                        <div class="d-flex px-4 gap-4">
                        <label for="hora_salida">{{__('Hora de salida')}}</label>
                        <input id="hora_salida" required type="time" class="form-control w-50" name="hora_salida">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-1 w-100 p-2">
                    <label for="desc">{{__('Descripción')}}</label>
                    <textarea id="desc" required type="text" class="form-control" name="descripcion"></textarea>
                </div>

                <div class="container py-3 d-flex justify-content-evenly">
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">{{__('Espacios')}}</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">{{__('Galería')}}</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">{{__('Servicios')}}</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">{{__('Normas')}}</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">{{__('Disponibilidad y precios')}}</div>
                </div>

                <div class="container-fluid d-flex justify-content-center">
                    <button type="submit" class="btn btn-info">{{__('Añadir propiedad')}}</button>
                </div>

            </div>
        </form>
@endsection
