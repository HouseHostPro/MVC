@extends('layouts.plantillaFormularios');

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Servicios')
@section('content')
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Comentarios</li>
        </ol>
    </nav>
    <form>
        @csrf
        <button type="submit" class="btn bg-primary bg-opacity-50">Guardar</button>
    </form>

    <script>
        $('#atras').remove();
    </script>
@endsection
