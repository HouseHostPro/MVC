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
<body>
    @foreach($traduccioNom as $nom)
        @if($nom -> lang === "es")
            <?php $nomTraduit = $nom?>
        @endif
    @endforeach

    @foreach($traduccioDesc as $desc)
        @if($desc -> lang === "es")
                <?php $descTraduit = $desc ?>
        @endif
    @endforeach
    <div class="container-fluid" id="contenedor">
        <div class="row flex-nowrap">
            <div class="col-sm-2 px-0 bg-primary bg-opacity-25">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="text-center pb-3 text-dark">
                        <h4 class="d-none d-sm-inline ">Opciones de configuración</h4>
                    </div>
                    <ul class="ms-2 mt-2 nav nav-pills flex-column  gap-2" id="menu">
                        <li class="nav-item">
                            <a href="{{route('espai.espais', ['id' => $propietat->id])}}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                                </svg>Espacios
                            </a>
                        </li>
                        <li>
                            <a class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                                </svg>Normas
                            </a>
                        </li>
                        <li>
                            <a class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                                </svg>Galería
                            </a>
                        </li>
                        <li>
                            <a href="{{route('property.service')}}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                                </svg>Servicios
                            </a>
                        </li>
                        <li>
                            <a href="{{route('property.calendar', ['id' => $propietat->id])}}" class="text-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 me-1 bi bi-arrow-return-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                                </svg>Disponibilidad y precios
                            </a>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col-md-10 row">

                <nav class="mt-4 col-12" style="--bs-breadcrumb-divider: '>'; height: 500px;" aria-label="breadcrumb" >
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('principal')}}">{{__('Principal')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('cuenta')}}">{{__('Cuenta')}}</a></li>
                        <li class="breadcrumb-item"><a href="{{route('property.properties')}}">{{__('Propiedades')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$propietat->nom}}</li>
                    </ol>
                </nav>
                <form method="post" action="{{ route('property.update', ['id' => $propietat -> id]) }}" class="col-12" >
                    @csrf
                    <div class="row">
                        <h2>Edición de la propiedad</h2>
                        <div class="col-sm-4 col-12 border-right">
                            <div class="d-flex flex-column align-items-center text-center ">
                                <img class="img-fluid ms-3 mt-4"  src="https://images.adsttc.com/media/images/5d34/e507/284d/d109/5600/0240/large_jpg/_FI.jpg?1563747560">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 border-right">
                            <div class="p-3 py-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">{{ $nomTraduit -> value }}</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-6">
                                        <label class="labels">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" value="{{ $nomTraduit -> value }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="language-">Descripción</label>
                                        <textarea class="form-control" name="descripcion">{{ $descTraduit -> value }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Ubicación</label><input type="text" class="form-control" placeholder="country" value="{{$propietat -> localitzacio}}"></div>
                                    <div class="col-md-6">
                                        <label class="label">Ciutat</label>
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
                                    <button class="btn btn-primary profile-button" type="submit">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (\Session::has('success'))
        <div id="successMessage" class="alert alert-success col-md-2 d-flex justify-content-between align-items-center">
            <p class="mb-0">{!! \Session::get('success') !!}</p>
            <span id="cancelMessage" class="material-symbols-outlined">cancel</span>
        </div>
    @endif


    <script>
        $(document).click("#cancelMessage")
    </script>
</body>
</html>
