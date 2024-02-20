@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Servicios')
@section('content')
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('principal')}}">{{__('Principal')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">{{__('Cuenta')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('property.properties')}}">{{__('Propiedades')}}</a></li>
            <li class="breadcrumb-item"><a href="{{URL::previous()}}">{{$propietat->nom}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('Servicios')}}</li>
        </ol>
    </nav>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="table-responsive bg-white">
                            <form action="{{route('saveService')}}" method="post" class="row col-12 justify-content-end">
                                @csrf
                            <table class="table table-hover mb-0 bg-white border-bottom border-dark">
                                <thead>
                                <tr class="text-center">
                                    <th>{{__('Nom')}}</th>
                                    <th>{{__('Descripción')}}</th>
                                    <th>{{__('Acciones')}}</th>
                                </tr>
                                </thead>
                                    <tbody id="tabla">

                                    </tbody>
                            </table>
                                <div class="col-2">
                                    <button type="submit" id="buttonSave" class="btn bg-primary bg-opacity-50 mt-3 ">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>


        let allServices = [];
        let allServicesByProperty = [];

        $(document).ready(function (){

            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/serviciosAjax`
            }).done(function (service) {
                allServices.push.apply(allServices, service);
                $.ajax({
                    method: 'GET',
                    url: `http://localhost:8100/serviciosByProperty`
                }).done(function (service) {
                    allServicesByProperty.push.apply(allServicesByProperty, service);
                    printServicios();
                });

            });


        })


        function printServicios(){

            $('#tabla').html("");

            allServices.forEach( function (value){

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

                let columnCheckbox = $('<td>');
                let chechkbox = $('<input>').attr({
                    type: 'checkbox',
                    name: `s-${value.id}`,
                    value: value.id
                });

                allServicesByProperty.forEach( function (serv){
                    if(serv.servei_id === value.id){
                        chechkbox.prop('checked',true);
                    }
                })

                columnCheckbox.append(chechkbox).addClass('text-center');
                fila.append(columnCheckbox);
                $('#tabla').append(fila);
            })
            let inputTotal = $('<inpunt>').attr({
                type: 'hidden',
                id: 'total',
                name: 'total'
            })
            let checkboxes = $('input[type="checkbox"]');
            checkboxes.change(function(){
                let count = checkboxes.filter(':checked').length
                $('#total').val(count);
            })
        }
        $('buttonSave').submit( function (value){

        })
        $('#atras').remove();
    </script>
@endsection
