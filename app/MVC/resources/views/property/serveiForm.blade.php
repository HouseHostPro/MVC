@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta', ['id' => $propietat -> id])}}
@endsection
@section('title',__('Servicios'))
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-7 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $propietat -> id])}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $propietat -> id])}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.properties', ['id' => $propietat -> id])}}">{{__('Propiedades')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.edit', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}">{{$propietat->nom}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Servicios')}}</li>
            </ol>
        </nav>
        <div class="col-sm-2 col-6 my-sm-3 my-2">
            <label>{{__('Buscar servicio')}}:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-12">
                        <div class="table-responsive bg-white">
                            <form action="{{route('saveService', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}" method="post" class="row col-12 ps-4 justify-content-end">
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
                                    <button type="submit" id="buttonSave" class="btn bg-primary bg-opacity-50 my-3 ">{{__('Guardar')}}</button>
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

            const url = window.location.href;
            const match = url.match(/\/property\/\d+\/property\/(\d+)\/servicios/);

            const host = location.host;
            $.ajax({
                method: 'GET',
                url: `http://${host}/serviciosAjax`
            }).done(function (service) {
                allServices.push.apply(allServices, service);
                $.ajax({
                    method: 'GET',
                    url: `http://${host}/serviciosByProperty/${match[1]}`
                }).done(function (service) {
                    allServicesByProperty.push.apply(allServicesByProperty, service);
                    printServicios();
                });
            });

            /*$.ajax({
                method: 'GET',
                url: '{{ route('property.traduccions') }}',
                data: {
                    "nom": "{{ $propietat -> nom }}",
                }
            }).done(function (traduccions) {
                const nomTraduit = traduccions[0].filter((tr) => tr.lang === "{{ app() -> getLocale() }}")[0].value;
                $("li:nth-child(4)").html(nomTraduit);
            });*/
        })

        function printServicios(){

            $('#tabla').html("");

            allServices.forEach( function (value){


                let fila = $('<tr>');
                let columnName = $('<td>').addClass('text-center');
                let columnDesc = $('<td>').addClass('text-center');

                let pNom = $('<p>').text(value.nom).addClass('pt-1');
                columnName.append(pNom);
                fila.append(columnName);

                let labelNumber = $('<label>').addClass('form-label pt-1').text('{{('Cuantos hay')}}');
                let inputNumber = $('<input>').attr({
                    type: 'number',
                    min: 0,
                    name: `s-${value.id}`,
                    value: 0
                }).addClass('form-control input-number ms-3').css('width', '10%').prop('disabled', true);

                let contenedorInput = $('<div>').addClass('d-flex justify-content-center');
                contenedorInput.append(labelNumber, inputNumber);
                columnDesc.append(contenedorInput);

                let columnCheckbox = $('<td>').addClass('text-center');
                let chechkbox = $('<input>').attr({
                    type: 'checkbox',
                }).addClass('form-check-input');

                // Evento que cuando el valor no sea cero se active el checkbox
                inputNumber.on('change', function() {
                    let checkbox = $(this).closest('tr').find('input[type="checkbox"]');
                    if ($(this).val() !== 0) {
                        // Activar el checkbox y habilitarlo si el valor no es 0
                        checkbox.prop('checked', true);
                        checkbox.prop('disabled', false);
                    } else {
                        // Desactivar el checkbox y deshabilitarlo si el valor es 0
                        checkbox.prop('checked', false);
                        checkbox.prop('disabled', true);
                    }
                });

                // Evento que cuando no este checked el input number se ponga a cero
                $(document).on('change', 'input[type="checkbox"]', function() {
                    let inputNumber = $(this).closest('tr').find('input[type="number"]');
                    if (!$(this).prop('checked')) {
                        // Si el checkbox no está marcado, establecer el valor del input en 0 y deshabilitar el checkbox
                        inputNumber.val(0);
                        inputNumber.prop('disabled', true);
                    } else {
                        // Si el checkbox está marcado, habilitar el input
                        inputNumber.prop('disabled', false);
                        inputNumber.val(1);
                    }
                });
                fila.append(columnDesc);
                columnCheckbox.append(chechkbox);
                fila.append(columnCheckbox);
                $('#tabla').append(fila);

                allServicesByProperty.forEach( function (servei){
                    if(servei.servei_id === value.id){
                        chechkbox.prop('checked',true);
                        inputNumber.val(servei.quantitat).prop('disabled', false);
                    }
                })
            })
        }
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
