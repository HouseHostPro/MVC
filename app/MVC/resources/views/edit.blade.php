@extends('layouts.plantilla')
@section('content')
    <div class="container">
        <form method="POST">
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Actualizar informacion</h1>
            </div>
            <div class="form-group mb-1 w-25">
                <label for="emailInput">Correo electrónico:</label>
                <input required type="email" class="form-control" name="email" aria-label="correo electronico" placeholder="correo electronico" value="{{$usuari->email}}">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="nameInput">Nombre</label>
                <input required type="text" class="form-control" name="nom" value="{{$usuari->nom}}">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="surnameInput">Apellido</label>
                <input required type="text" class="form-control" name="cognom1" value="{{$usuari->cognom1}}">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="secondSurnameInput">Segundo Apellido</label>
                <input type="text" class="form-control" name="cognom2" value="{{$usuari->cognom2}}">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="addressInput">Dirección</label>
                <input required type="text" class="form-control" name="direccio" value="{{$usuari->direccio}}">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="phoneInput">Teléfono</label>
                <input required type="tel" class="form-control" name="telefon" value="{{$usuari->telefon}}">
            </div>
            <di class="bottom-100">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </di>
        </form>
    </div>

