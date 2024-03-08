@extends('layouts.plantilla' . $PLANTILLA)

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center mt-5" >
        <div class="container-sm container-fluid d-flex justify-content-center">
            <div class="card border-black shadow" style="width: 50%; height: 40%">
                <div class="card-body mx-5">
                    <h1 class="card-title text-center text-primary my-4 ">{{__('Iniciar sesión')}}</h1>
                    <form method="post" action="{{ route('login.check', ['id' => $PROPIETAT_ID]) }}" class="d-flex flex-column justify-content-end" style="height: 80%;">
                        @csrf
                        <input type="hidden" value="" name="casaId">
                        <div class="form-group mt-4">
                            <label for="correo">{{__('Correo electrónico')}}:</label>
                            <input type="email" class="form-control mt-2 border-black" id="correo" name="email" aria-describedby="emailHelp" placeholder="user@...." autocomplete="username" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="contraseña">{{__('Contraseña')}}:</label>
                            <input type="password" class="form-control mt-2 border-black" id="contraseña" name="password" placeholder="*******" autocomplete="current-password" required>
                        </div>
                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">{{__('Iniciar sesión')}}</button>
                        </div>
                        <p class="my-4">No tienes cuenta? <a href="{{ route('user.register', ['id' => $PROPIETAT_ID]) }}" class="link-underline-light">{{__('Registrarse')}}</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

