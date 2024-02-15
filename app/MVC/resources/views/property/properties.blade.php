@extends('layouts.plantillaFormularios');

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Propiedades')
@section('content')

    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-6" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
                <li class="breadcrumb-item active" aria-current="page">Propiedades</li>
            </ol>
        </nav>
        <div class="col-3 mt-3 text-end">
            <form method="get" action="{{ route('property.loadForm') }}">
                <button type="submit" class="btn bg-primary bg-opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus pb-1" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>Añadir propiedad
                </button>
            </form>
        </div>
    </div>
        <div class="gradient-custom-1 ">
            <div class="mask d-flex align-items-center ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div class="table-responsive bg-white">
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




