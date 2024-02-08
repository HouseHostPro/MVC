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

    <!-- Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Rating -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/js/star-rating.min.js" integrity="sha512-BjVoLC9Qjuh4uR64WRzkwGnbJ+05UxQZphP2n7TJE/b0D/onZ/vkhKTWpelfV6+8sLtQTUqvZQbvvGnzRZniTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.1.2/css/star-rating.min.css" integrity="sha512-0VKIzRYJRN0QKkUNbaW7Ifj5sPZiJVAKF1ZmHB/EMHtZKXlzzbs4ve0Z0chgkwDWP6HkZlGShFj5FHoPstke1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Date-picker -->
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" ></script>


    <!--Carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            Idioma
                        </button>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list text-light" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Iniciar sesion</a></li>

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
                <h5 class="modal-title" id="exampleModalLabel">Idiomas</h5>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <div class="container-fluid d-flex justify-content-center align-items-center mt-5" >
        <div class="container-sm container-fluid d-flex justify-content-center">
            <div class="card border-black shadow" style="width: 50%; height: 40%">
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
                        <!--
                        <div class="form-group form-check my-4">
                            <input type="checkbox" class="form-check-input border-black" name="remember" id="recuerdame">
                            <label class="form-check-label" for="recuerdame">Recuerdarme</label>
                        </div>
                        -->
                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
                        </div>
                        <p class="my-4">No tienes cuenta? <a href="{{ route('user.register') }}" class="link-underline-light">Registrarse</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
