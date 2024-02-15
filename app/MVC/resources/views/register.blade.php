@extends('layouts.plantillaFormularios')
@section('url')
    {{route('login')}}
@endsection
@guest
@section('title','Crear de usuario')
@endguest
@section('title','Modificar de usuario')
@section('content')
    @auth
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Principal</a></li>
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
            <li class="breadcrumb-item active" aria-current="page">Información Personal</li>
        </ol>
    </nav>
    @endauth
        <form class="d-flex flex-column justify-content-center gap-4" method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="row justify-content-center mt-4">
                <div class="form-group mb-1 col-5">
                    <label for="emailInput">Correo electrónico:</label>
                    <input required type="email" class="form-control" name="email" value="@auth{{$user->email}}@endauth" aria-label="correo electronico" placeholder="correo electrónico">
                </div>
                <div class="form-group mb-1 col-5">
                    <div class="col-12 row">
                        <div class="col-11">
                            <label for="passwordInput">Contraseña:</label>
                            <input required id="pass" type="password" class="form-control" value="@auth{{$user->contrasenya}}@endauth" name="contrasenya" placeholder="Contraseña">
                        </div>
                        <div class="col-1 pt-4 ">
                            <button id="noVer" type="button" class="btn btn-link p-0 pt-1 text-black">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
                                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
                                    <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
                                </svg>
                            </button>
                            <button id="ver" type="button" class="btn btn-link p-0 pt-1 text-black" hidden>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group mb-1 col-5">
                    <label for="nameInput">Nombre:</label>
                    <input required type="text" class="form-control" value="@auth{{$user->nom}}@endauth" name="nom" placeholder="Nombre">
                </div>
                <div class="form-group mb-1 col-5">
                    <label for="surnameInput">Primer Apellido:</label>
                    <input required type="text" class="form-control" value="@auth{{$user->cognom1}}@endauth" name="cognom1" placeholder="Apellido">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group mb-1 col-5">
                    <label for="secondSurnameInput">Segundo Apellido:</label>
                    <input type="text" class="form-control" value="@auth{{$user->cognom2}}@endauth" name="cognom2" placeholder="Segundo apellido">
                </div>
                <div class="form-group mb-1 col-5">
                    <label for="phoneInput">Teléfono:</label>
                    <input required type="tel" class="form-control" value="@auth{{$user->telefon}}@endauth" name="telefon" placeholder="Telefono">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="form-group mb-1 col-4">
                    <label for="addressInput">Dirección:</label>
                    <input required type="text" class="form-control" value="@auth{{$user->direccio}}@endauth" name="direccio" placeholder="Direccion">
                </div>
                <div class="form-group mb-1 col-3">
                    <label for="ciutat">Ciudad</label>
                    <select id="city" required name="ciutat_id" class="form-control">
                        @foreach($ciutats as $ciutat)
                            @auth
                                @if($user->ciutat->nom == $ciutat->nom)
                                    <option value="{{ $ciutat->id }}" selected>{{$ciutat->nom}}</option>
                                    <input id="city{{ $ciutat->id }}" type="text" value="{{ $ciutat->pais_id }}" hidden>
                                @else
                                    <option value="{{ $ciutat->id }}">{{$ciutat->nom}}</option>
                                @endif
                            @endauth
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2 col-3">
                    <label for="pais">Pais</label>
                    <select required name="pais_id" class="form-control">
                        @foreach($paises as $pais)
                            @auth
                                @if($user->ciutat->pais->nom == $pais->nom)
                                    <option value="{{ $pais->id }}" selected>{{$pais->nom}}</option>
                                @else
                                    <option value="{{ $pais->id }}">{{$pais->nom}}</option>
                                @endif
                            @endauth
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                @guest
                <div class="form-check col-10 ms-4">
                    <input required class="form-check-input" type="checkbox" value="" name="privacyPolicyCheckbox">
                    <label class="form-check-label" for="privacyPolicyCheckbox">
                        Acepto la política de privacidad y seguridad
                    </label>
                </div>
                @endguest
                <di class="text-end col-10">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </di>
            </div>
        </form>
@auth
    <script>
        $('#atras').remove();

        $('#noVer').on('click',function (){
            const input = $('#pass');
            input.attr('type','text');
            $(this).prop('hidden', true);
            $('#ver').prop('hidden', false);
        });

        $('#ver').on('click',function (){
            const input = $('#pass');
            input.attr('type','password');
            $(this).prop('hidden', true);
            $('#noVer').prop('hidden', false);
        })


    </script>
@endauth
@endsection


