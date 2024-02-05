@extends('layouts.plantilla')

@section('content')
        <form class="container-fluid d-flex flex-column px-0 align-items-center" method="post">
            @csrf
            <h1 class="py-5 px-2">Añadir propiedad</h1>

            <div class="container d-flex flex-wrap bg-body-secondary border-2 col-7 py-4 px-4
            shadow-lg p-3 mb-5 bg-white rounded">
                <div class="form-group mb-1 w-50 p-2">
                    <label for="nombre">Nombre de la propiedad</label>
                    <input id="nombre" required type="text" class="form-control" name="nombre_propiedad">
                </div>
                <div class="form-group mb-1 w-50 p-2">
                    <label for="cancelacion">Límite de días para cancelar sin recargo</label>
                    <input id="cancelacion" required type="number" class="form-control" name="cancelacion">
                </div>
                <div class="form-group mb-1 w-50 p-2">
                    <label for="ubicacion">Ubicación</label>
                    <input id="ubicacion" required type="text" class="form-control" name="ubicacion">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="precio">Precio por noche</label>
                    <input id="precio" required type="number" class="form-control" name="precio">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="precio_limpieza">Coste de limpieza</label>
                    <input id="precio_limpieza" required type="number" class="form-control" name="precio_limpieza">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="m2">Tamaño</label>
                    <input id="m2" required type="text" class="form-control" name="m2">
                </div>

                <div class="form-group mb-1 w-50 p-2">
                    <label for="ciudad">Ciudad o municipio</label>
                    <select id="ciudad" class="form-select" name="ciudad">
                        @foreach($ciutats as $ciutat)
                            <option value="{{$ciutat -> id}}">{{$ciutat -> nom}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group mb-1 w-50 p2 py-3">
                    <div class="d-flex flex-column">
                        <div class="d-flex px-4 gap-2">
                        <label for="hora_entrada">Hora de entrada</label>
                        <input id="hora_entrada" required type="time" class="form-control w-50" name="hora_entrada">
                        </div>

                        <div class="d-flex px-4 gap-4">
                        <label for="hora_salida">Hora de salida</label>
                        <input id="hora_salida" required type="time" class="form-control w-50" name="hora_salida">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-1 w-100 p-2">
                    <label for="desc">Descripción</label>
                    <textarea id="desc" required type="text" class="form-control" name="descripcion"></textarea>
                </div>

                <div class="container py-3 d-flex justify-content-evenly">
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">Espacios</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">Galería</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">Servicios</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">Normas</div>
                    <div class="btn btn-white bg-white text-primary rounded-3 border-2 border-secondary px-3 py-3">Disponibilidad y precios</div>
                </div>

                <div class="container-fluid d-flex justify-content-center">
                    <button type="submit" class="btn btn-info">AÑADIR PROPIEDAD</button>
                </div>

            </div>
        </form>
@endsection
