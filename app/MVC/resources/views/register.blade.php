@extends('layouts.plantilla')
@section('content')
    <div class="container">
        <form class="d-flex flex-column justify-content-center" method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="d-flex justify-content-center">
                <h1>Creacion de usuario</h1>
            </div>
            <div class="form-group mb-1 w-25">
                <label for="emailInput">Correo electrónico:</label>
                <input required type="email" class="form-control" name="email" aria-label="correo electronico" placeholder="correo electronico">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="nameInput">Nombre</label>
                <input required type="text" class="form-control" name="nom">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="surnameInput">Apellido</label>
                <input required type="text" class="form-control" name="cognom1">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="secondSurnameInput">Segundo Apellido</label>
                <input type="text" class="form-control" name="cognom2">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="passwordInput">Contraseña</label>
                <input required type="password" class="form-control" name="contrasenya">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="addressInput">Dirección</label>
                <input required type="text" class="form-control" name="direccio">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="phoneInput">Teléfono</label>
                <input required type="tel" class="form-control" name="telefon">
            </div>
            <div class="form-group mb-1 w-25">
                <label for="ciutat">Ciudad</label>
                <select required name="ciutat_id" class="form-control">
                    @foreach($ciutats as $ciutat)
                        <option value="{{ $ciutat->id }}">{{$ciutat->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2 w-25">
                <label for="pais">Pais</label>
                <select required name="pais_id" class="form-control">
                    @foreach($paises as $pais)
                        <option value="{{ $pais->id }}">{{$pais->nom}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-check">
                <input required class="form-check-input" type="checkbox" value="" name="privacyPolicyCheckbox">
                <label class="form-check-label" for="privacyPolicyCheckbox">
                    Acepto la política de privacidad y seguridad
                </label>
            </div>
            <di class="bottom-100">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </di>
        </form>
    </div>
@endsection
