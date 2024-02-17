@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Servicios')
@section('content')
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">Principal</a></li>
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">Cuenta</a></li>
            <li class="breadcrumb-item"><a href="{{route('property.properties')}}">Propiedades</a></li>
            <li class="breadcrumb-item"><a href="{{URL::previous()}}">{{$propietat->nom}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Servicios</li>
        </ol>
    </nav>
        <select id="servicios" name="servicios" class="form-control">
            @foreach($servicios as $servicio)
                <option value="{{ $servicio->id}}" selected>{{$servicio->nom}}</option>
            @endforeach
        </select>
    <form id="formSevice">
        @csrf
        <button type="submit" class="btn bg-primary bg-opacity-50">Guardar</button>
    </form>

    <script>

        let services = [];
        $(document).ready(function (){

            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/serviciosAjax`
            }).done(function (servicios) {
                console.log(servicios);
                //printServicios(servicios)
            });
        })

        $('#servicios').change(function(){
            let id = $(this).val();
            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/servicio/${id}`
            }).done(function (servicio) {
                console.log(servicio);
                services.push(servicio);
                printServicios()
            });
        })

        function printServicios(){


            services.forEach( function (value){

                let labelNom = $('<label>').attr('for','nom' + value.id).text('Nom:')
                $('#formSevice').append(labelNom);
                let inputNom = $('<input>').attr({
                    type: 'text',
                    id: 'nom' + value.id,
                    name: 'nom' + value.id,
                    value: value.nom
                })
                $('#formSevice').append(inputNom);

                let labelDesc = $('<label>').attr('for','desc' + value.id).text('Descripcio:')
                $('#formSevice').append(labelDesc);
                let inputDesc = $('<input>').attr({
                    type: 'text',
                    id: 'desc' + value.id,
                    name: 'desc' + value.id,
                    value: value.descripcio
                })
                $('#formSevice').append(inputDesc);

                let inputHidden = $('<inpunt>').attr({
                    type: 'hidden',
                    name: 'id' + value.id,
                    value: value.id
                })
                $('#formSevice').append(inputHidden);

            })
        }
        $('#atras').remove();
    </script>
@endsection
