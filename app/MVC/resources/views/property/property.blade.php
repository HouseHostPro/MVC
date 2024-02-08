@extends('layouts.plantilla')

@section('content')
    @foreach($propietats as $propietat)
        <p>{{$propietat -> nom}}</p>
    @endforeach
@endsection
