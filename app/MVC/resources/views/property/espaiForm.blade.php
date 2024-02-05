@php use Illuminate\Support\Facades\Session; @endphp
@extends('layouts/plantilla')


@section('content')
    <div class="container w-50">
        <h1>Editar espacios</h1>
    </div>

    @if(Session::has('success'))
        <p>{{Session::get('success')}}</p>
    @endif

@endsection
