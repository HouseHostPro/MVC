@extends('layouts.plantillaFormularios');

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Propiedades')
@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <div class="gradient-custom-1 h-100">
            <div class="mask d-flex align-items-center h-100">
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Propiedades</li>
        </ol>
    </nav>
        <div class="gradient-custom-1 ">
            <div class="mask d-flex align-items-center ">
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
                                <table class="table mb-0 bg-white border-bottom border-dark">
                                    <thead>
                                    <tr>
                                        <th>Nombre propiedad</th>
                                        <th>Imagen</th>
                                        <th>Ubicación</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($propietats as $propietat)
                                        <tr>
                                            <td>{{$propietat -> nom}}</td>
                                            <td>
                                                <img style="height: 150px; width: 150px" src="https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/large_jpg/_FI.jpg?1563747560">
                                            </td>
                                            <td>{{$propietat -> localitzacio}}</td>
                                            <td>
                                                <form method="get" action="{{ route('property.edit', ['id' => $propietat->id]) }}">
                                                    <button type="submit" class="btn bg-success bg-opacity-50">Editar</button>
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

    @auth
        <script>
            $('#atras').remove();
        </script>
    @endauth

@endsection




