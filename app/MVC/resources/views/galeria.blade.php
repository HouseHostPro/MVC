@extends('layouts.plantillaFormularios')

@section('url')
    {{ back() }}
@endsection
@section('title', __('Galería'))
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-7 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $PROPIETAT_ID])}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $PROPIETAT_ID])}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.properties', ['id' => $PROPIETAT_ID])}}">{{__('Propiedades')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::previous()}}"></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Galería')}}</li>
            </ol>
        </nav>
    </div>


    <script>

        $(document).ready( function () {

            $.ajax({
                method: 'GET',
                url: '{{ route('property.traduccions') }}',
                data: {
                    "nom": "{{ $propietat -> nom }}",
                }
            }).done( function (traduccions) {
                const nomTraduit = traduccions[0].filter((tr) => tr.lang === "{{ app() -> getLocale() }}")[0].value;
                $("li:nth-child(4)").html(nomTraduit);
            });

        });

    </script>
@endsection
