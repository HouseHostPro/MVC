@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta', ['id' => $PROPIETAT_ID])}}
@endsection
@section('title',__('Galeria'))
@section('content')
    <nav class="mt-3 col-sm-7 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $PROPIETAT_ID])}}">{{__('Principal')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $PROPIETAT_ID])}}">{{__('Cuenta')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('property.properties', ['id' => $PROPIETAT_ID])}}">{{__('Propiedades')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('property.edit', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}">{{$propietat->nom}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('Galeria')}}</li>
        </ol>
    </nav>

    <div class="row mb-5">
        @foreach($allUrls as $url)

            <div class="col-sm-4 p-3">
                <div class="card bg-dark text-white">
                    <img src="{{$url['url']}}" class="card-img" alt="..." style="max-height: 270px; max-width: 406px;">
                    <div class="card-img-overlay pe-1 pt-1">
                        <form method="post" action="{{route('delete.image', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}" class="text-end">
                            @csrf
                            <button type="submit" class="btn bg-white text-black bg-opacity-50 border-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3 " viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </button>
                            <input type="text" name="id" value="{{$url['id']}}" hidden>
                            <input type="text" name="idProp" value="{{$PROPIETAT_ID}}" hidden>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <form action="{{route('store.image', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label id="allImagenes" for="formFileMultiple" class="form-label">Selecciona las imagenes:</label>
            <input class="form-control" type="file" name="imagen[]" id="formFileMultiple" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <script>

        $('#atras').remove();

    </script>
@endsection
