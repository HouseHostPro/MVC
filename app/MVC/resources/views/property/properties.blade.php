@extends('layouts.plantillaFormularios');

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Propiedades')
@section('content')
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

    @auth
        <script>
            $('#atras').remove();
        </script>
    @endauth

@endsection




