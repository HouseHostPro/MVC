@extends('layouts.plantilla')

@section('content')
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100%;">
        <div class="container-sm container-fluid d-flex justify-content-center">
            <div class="card border-black shadow" style="width: 65%; height: 50%">
                <div class="card-body mx-5">
                    <h1 class="card-title text-center text-primary my-4 ">Iniciar Sesión</h1>
                    <form method="post" action="{{ route('login.check') }}" class="d-flex flex-column justify-content-end" style="height: 80%;">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="correo">Correo electrónico:</label>
                            <input type="email" class="form-control mt-2 border-black" id="correo" name="email" aria-describedby="emailHelp" placeholder="user@...." autocomplete="username" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="contraseña">Contraseña:</label>
                            <input type="password" class="form-control mt-2 border-black" id="contraseña" name="password" placeholder="*******" autocomplete="current-password" required>
                        </div>
                        <div class="form-group form-check my-4">
                            <input type="checkbox" class="form-check-input border-black" name="remember" id="recuerdame">
                            <label class="form-check-label" for="recuerdame">Recuerdarme</label>
                        </div>
                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
                        </div>
                        <p class="mt-5 mb-4">No tienes cuenta? <a href="{{ route('user.register') }}" class="link-underline-light">Registrarse</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
