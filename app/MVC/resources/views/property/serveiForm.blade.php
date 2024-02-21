@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta')}}
@endsection
@section('title','Servicios')
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-7 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal')}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta')}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.properties')}}">{{__('Propiedades')}}</a></li>
                <li class="breadcrumb-item"><a href="{{URL::previous()}}">{{$propietat->nom}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Servicios')}}</li>
            </ol>
        </nav>
        <div class="col-sm-2 col-6 my-sm-3 my-2">
            <label>Buscar servicio:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-12">
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
                                <div class="col-2 me-sm-0 me-5">
                                    <button type="submit" id="buttonSave" class="btn bg-primary bg-opacity-50 my-3 ">Guardar</button>
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
        }
        $('buttonSave').submit( function (value){
        })

        $('#cercador').on("input",function (){

            const caracters = $(this).val().toUpperCase();
            const tabla = $('#tabla');

            tabla.find('tr').each(function () {
                const nombrePropiedad = $(this).find('td:first').text().toUpperCase();
                if (nombrePropiedad.includes(caracters)) {
                    $(this).show(); // Mostrar fila si coincide con la búsqueda
                } else {
                    $(this).hide(); // Ocultar fila si no coincide con la búsqueda

                }
            });
        });
        $('#atras').remove();
    </script>
@endsection
