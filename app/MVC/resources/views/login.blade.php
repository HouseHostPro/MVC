<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('build/assets/custom.css')}}">
    <script src="{{asset('build/assets/custom2.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body style="height: 98vh;">
<nav class="navbar navbar-expand navbar-dark bg-primary sticky-top" >
    <div class="container-fluid" >
        <a class="navbar-brand" href="{{ route('principal') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door-fill mb-2" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
            </svg>
            HouseHostPro
        </a>
        <div class="d-flex" >
            <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                <ul class="navbar-nav" >
                    <li class="nav-item me-3" >
                        <button type="button" class="btn btn-link text-decoration-none text-light fs-5" data-bs-toggle="modal" data-bs-target="#idiomes">
                            {{__('Idioma')}}
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list text-light" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdownMenuLink">
                            @guest
                                <li><a class="dropdown-item" href="{{ route('login') }}">{{__('Iniciar sesión')}}</a></li>
                            @endguest
                            <li><a class="dropdown-item" href="{{ route('cuenta') }}">{{__('Cuenta')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="idiomes" tabindex="0"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Idiomas')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <form class="d-flex justify-content-between" >
                            <button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Catalan</button>
                            <button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Castellano</button>
                            <button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Inglés</button>
                            <button type="submit" class="btn btn-link text-decoration-none text-dark col-2 p-0 border-0" data-bs-dismiss="modal">Aleman</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cerrar')}}</button>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid d-flex justify-content-center align-items-center mt-5" >
        <div class="container-sm container-fluid d-flex justify-content-center">
            <div class="card border-black shadow" style="width: 50%; height: 40%">
                <div class="card-body mx-5">
                    <h1 class="card-title text-center text-primary my-4 ">{{__('Iniciar sesión')}}</h1>
                    <form method="post" action="{{ route('login.check') }}" class="d-flex flex-column justify-content-end" style="height: 80%;">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="correo">{{__('Correo electrónico')}}:</label>
                            <input type="email" class="form-control mt-2 border-black" id="correo" name="email" aria-describedby="emailHelp" placeholder="user@...." autocomplete="username" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="contraseña">{{__('Contraseña')}}:</label>
                            <input type="password" class="form-control mt-2 border-black" id="contraseña" name="password" placeholder="*******" autocomplete="current-password" required>
                        </div>
                        <!--
                        <div class="form-group form-check my-4">
                            <input type="checkbox" class="form-check-input border-black" name="remember" id="recuerdame">
                            <label class="form-check-label" for="recuerdame">Recuerdarme</label>
                        </div>
                        -->
                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">{{__('Iniciar sesión')}}</button>
                        </div>
                        <p class="my-4">No tienes cuenta? <a href="{{ route('user.register') }}" class="link-underline-light">{{__('Registrarse')}}</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
