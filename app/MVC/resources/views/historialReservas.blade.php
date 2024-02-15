@extends('layouts.plantillaFormularios');

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Reservas')
@section('content')
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Principal</a></li>
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Historial de Reservas</li>
        </ol>
    </nav>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="table-responsive bg-white">
                            <table class="table mb-0 bg-white border-bottom border-dark">
                                <thead>
                                <tr class="text-center">
                                    <th>Nombre propiedad</th>
                                    <th>Fecha entrada/salida</th>
                                    <th>Personas</th>
                                    <th>Precio total</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < count($reservas);$i++)
                                    <tr class="text-center">
                                        <td>{{$reservas[$i]->propiedad->nom}}</td>
                                        <td>{{$reservas[$i]->data_inici}} - {{$reservas[$i]->data_fi}}</td>
                                        <td >{{$reservas[$i]->persones}}</td>
                                        <td >{{$reservas[$i]->preu_total}}</td>
                                        <td>
                                            <form method="get" action="{{route('')}}">
                                                @csrf
                                                <button type="submit" class="btn bg-light">Ver</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endfor
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

