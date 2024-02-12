@extends('layouts/plantilla')

@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="table-responsive bg-white">
                                <div class="col-md-3">
                                    <div class="btn btn-light border-3 d-flex align-items-center col-md-10">
                                        <span class="material-symbols-outlined">add</span>
                                        <form method="get" action="{{ route('property.loadForm') }}">
                                            <button class="btn">Añadir propiedad</button>
                                        </form>
                                    </div>
                                </div>
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th class="bg-body-secondary" scope="col">Nombre propiedad</th>
                                        <th class="bg-body-secondary" scope="col">Imagen</th>
                                        <th class="bg-body-secondary" scope="col">Ubicación</th>
                                        <th class="bg-body-secondary" scope="col">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($propietats as $propietat)
                                        <tr>
                                            <th scope="row">{{$propietat -> nom}}</th>
                                            <td>
                                                <img style="height: 200px; width: 200px" src="https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/large_jpg/_FI.jpg?1563747560">
                                            </td>
                                            <td>{{$propietat -> localitzacio}}</td>
                                            <td>
                                                <form method="get" action="{{ route('property.edit', ['id' => $propietat->id]) }}">
                                                    <button type="submit">Editar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection




