<nav id="header" class="color-header navbar navbar-expand navbar-dark" >
    <div class="container-fluid" >
        <a class="navbar-brand" href="{{ route('principal', ['id' => $PROPIETAT_ID]) }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door-fill mb-2" viewBox="0 0 16 16">
                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
            </svg>
            @yield('titol')
        </a>
        <div class="d-flex " >
            <div class="collapse navbar-collapse" id="navbarNavDropdown" >
                <ul class="navbar-nav" >
                    <li class="nav-item me-3 align-self-center" >
                        <button type="button" class="text-white btn bg-transparent border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{__('Idiomas')}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end me-5" aria-labelledby="navbarDropdownMenuLink">
                            <li class="pt-1">
                                <a class="text-decoration-none ms-3" href="/es">{{__('Español')}}</a>
                            </li>
                            <li class=" pb-1 pt-2">
                                <a class="text-decoration-none ms-3" href="/en">{{__('Inglés')}}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list text-light" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2 " aria-labelledby="navbarDropdownMenuLink">
                            @guest
                                <li><a class="text-decoration-none ms-3 pt-1" href="{{ url('/login', ['id' => $PROPIETAT_ID]) }}">{{__('Iniciar sesión')}}</a></li>
                            @endguest
                            <li>
                                <form method="post" action="{{ route('cuenta', ['id' => $PROPIETAT_ID]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link  text-decoration-none ps-3">{{__('Cuenta')}}</button>
                                </form>
                            </li>
                            @auth
                                <li>
                                    <form method="post" action="{{ route('logout', ['id' => $PROPIETAT_ID]) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link text-decoration-none ps-3">{{__('Cerrar sesión')}}</button>
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

