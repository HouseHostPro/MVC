@extends('layouts/plantillaFormularios')

@section('url')
    {{ route('cuenta') }}
@endsection
@section('title',__('Propiedades'),__('Editar propiedad'))
@section('content')

    @foreach($traduccioNom as $nom)
        @if($nom -> lang === Config::get('app.locale'))
            <?php $nomTraduit = $nom ?>
        @endif
    @endforeach

    @foreach($traduccioDesc as $desc)
        @if($desc -> lang === Config::get('app.locale'))
                <?php $descTraduit = $desc ?>
        @endif
    @endforeach
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-6" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal')}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta')}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.properties')}}">{{__('Propiedades')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Editar propiedad')}}</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid" id="contenedor">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Menu</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i>
                                <a href="{{route('espai.espais', ['id' => $propietat->id])}}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Espacios</a>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-house"></i>
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Normas</a></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-house"></i>
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Galería</a></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-house"></i>
                                <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Servicios</a></a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people"></i>
                                <a href="{{route('property.calendar', ['id' => $propietat->id])}}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">Disponibilidad y precios</a>
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <form method="post" action="{{ route('property.update', ['id' => $propietat -> id]) }}" class="col-md-10">
                @csrf
                <div class="col py-3">
                    <div class="container rounded bg-white mt-5 mb-5">
                        <div class="row">
                            <h2>{{__('Editar propiedad')}}</h2>
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <img style="height: 200px; width: 200px" src="https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/large_jpg/_FI.jpg?1563747560">
                                </div>
                            </div>
                            <div class="col-md-6 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">{{ $nomTraduit -> value }}</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label class="labels">{{__('Nombre')}}</label>
                                            <input type="text" name="nombre" class="form-control" value="{{ $nomTraduit -> value }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <label class="language-">{{__('Descripción')}}</label>
                                            <textarea class="form-control" name="descripcion">{{ $descTraduit -> value }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels">{{__('Ubicación')}}</label><input type="text" class="form-control" placeholder="country" value="{{$propietat -> localitzacio}}"></div>
                                        <div class="col-md-6">
                                            <label class="label">{{__('Ciutat')}}</label>
                                            <select class="form-control">
                                                @foreach($ciutats as $ciutat)
                                                    <option value="{{$ciutat -> id}}" @if($ciutat -> id === $propietat -> ciutat_id) selected @endif>{{$ciutat -> nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="nameCode" value="{{ $propietat -> nom }}" />
                                    <input type="hidden" name="descCode" value="{{ $propietat -> descripcio }}" />
                                    <input type="hidden" name="id" value="{{ $propietat -> id }}" />
                                    <div class="mt-5 text-center">
                                        <button class="btn btn-primary profile-button" type="submit">{{__('Guardar cambios')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (\Session::has('success'))
        <div id="successMessage" class="alert alert-success col-md-2 d-flex justify-content-between align-items-center">
            <p class="mb-0">{!! \Session::get('success') !!}</p>
            <span id="cancelMessage" class="material-symbols-outlined">cancel</span>
        </div>
    @endif
@endsection

<script>
    $(document).click("#cancelMessage")
</script>
