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
    <div id="selectContainer"  class="mb-2">

    </div>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="table-responsive bg-white">
                            <form action="post" class="row col-12 justify-content-end">
                                @csrf
                            <table class="table table-hover mb-0 bg-white border-bottom border-dark">
                                <thead>
                                <tr class="text-center">
                                    <th>Nom</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                    <tbody id="tabla">

                                    </tbody>
                            </table>
                                <div class="col-2">
                                    <button type="submit" class="btn bg-primary bg-opacity-50 mt-3 ">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        let serviceObj = [];
        let allservices = [];

        $(document).ready(function (){

            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/serviciosAjax`
            }).done(function (service) {
                allservices.push.apply(allservices, service);
                printSelect();
            });
        })



        function printSelect(){

            let select = $('<select>').attr({
                id: 'servicios',
                name: 'servicios',
                class: 'form-control'
            })

            allservices.forEach( function(value){

                let option = $('<option>').attr('value', value.id).text(value.nom);
                select.append(option);
            })
            $('#selectContainer').append(select);

            $('#servicios').change(function(){
                let id = $(this).val();
                console.log(id)
                $.ajax({
                    method: 'GET',
                    url: `http://localhost:8100/servicio/${id}`
                }).done(function (servicio) {
                    console.log(servicio);
                    serviceObj.push(servicio);
                    printServicios()
                });
            })
        }
        function printServicios(){

            $('#tabla').html("");

            serviceObj.forEach( function (value){

                let fila = $('<tr>');
                let columnName = $('<td>');

                let pNom = $('<p>').text(value.nom);
                columnName.append(pNom).addClass('text-center');
                fila.append(columnName);


                let columnDesc = $('<td>');
                let pDesc = $('<p>').text(value.descripcio);
                columnDesc.append(pDesc).addClass('text-center');
                fila.append(columnDesc);

                let inputHidden = $('<inpunt>').attr({
                    type: 'hidden',
                    name: 'id' + value.id,
                    value: value.id
                })
                columnDesc.append(inputHidden);

                fila.append(columnName);
                fila.append(columnDesc);

                let columnButton = $('<td>');
                let botonGuardar = $('<button>').attr({
                    type: 'button',
                    id: 'delete'
                }).addClass('btn bg-danger bg-opacity-50').text('Eliminar');
                columnButton.append(botonGuardar).addClass('text-center');
                fila.append(columnButton);
                $('#tabla').append(fila);
            })
        }
        $('#atras').remove();
    </script>
@endsection
