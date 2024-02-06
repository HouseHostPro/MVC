@extends('layouts.plantilla')

@section('content')

    <main class="container-fluid d-flex justify-content-center">
        <div class="container-sm">
            <p>{{$request->session()->get('username')}}</p>
        </div>
    </main>

@endsection
