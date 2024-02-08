@extends('layouts.plantillaFormularios')
@section('url')
    {{route('login')}}
@endsection
@section('title','Creacion de usuario')
@section('content')
        <form class="d-flex flex-column justify-content-center gap-4" method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="row justify-content-center mt-4">
                <div class="form-group mb-1 col-5">
                    <label for="emailInput">Correo electrónico:</label>
                    <input required type="email" class="form-control" name="email" aria-label="correo electronico" placeholder="correo electronico">
                </div>
                <div class="form-group mb-1 col-5">
                    <label for="passwordInput">Contraseña:</label>
                    <input required type="password" class="form-control" name="contrasenya" placeholder="Contraseña">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group mb-1 col-5">
                    <label for="nameInput">Nombre:</label>
                    <input required type="text" class="form-control" name="nom" placeholder="Nombre">
                </div>
                <div class="form-group mb-1 col-5">
                    <label for="surnameInput">Apellido:</label>
                    <input required type="text" class="form-control" name="cognom1" placeholder="Apellido">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group mb-1 col-5">
                    <label for="secondSurnameInput">Segundo Apellido:</label>
                    <input type="text" class="form-control" name="cognom2" placeholder="Segundo apellido">
                </div>
                <div class="form-group mb-1 col-5">
                    <label for="phoneInput">Teléfono:</label>
                    <input required type="tel" class="form-control" name="telefon" placeholder="Telefono">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group mb-1 col-4">
                    <label for="addressInput">Dirección:</label>
                    <input required type="text" class="form-control" name="direccio" placeholder="Direccion">
                </div>
                <div class="form-group mb-1 col-3">
                    <label for="ciutat">Ciudad</label>
                    <select required name="ciutat_id" class="form-control">
                        @foreach($ciutats as $ciutat)
                            <option value="{{ $ciutat->id }}">{{$ciutat->nom}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2 col-3">
                    <label for="pais">Pais</label>
                    <select required name="pais_id" class="form-control">
                        @foreach($paises as $pais)
                            <option value="{{ $pais->id }}">{{$pais->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-check col-10 ms-4">
                    <input required class="form-check-input" type="checkbox" value="" name="privacyPolicyCheckbox">
                    <label class="form-check-label" for="privacyPolicyCheckbox">
                        Acepto la política de privacidad y seguridad
                    </label>
                </div>
                <di class="bottom-100 text-end col-10">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </di>
            </div>
        </form>
@endsection
