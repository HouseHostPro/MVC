@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta', ['id' => $propietat -> id])}}
@endsection
@section('title',__('Normas'))
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-7 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $propietat -> id])}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $propietat -> id])}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.properties', ['id' => $propietat -> id])}}">{{__('Propiedades')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.edit', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}">{{$propietat->nom}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Normas')}}</li>
            </ol>
        </nav>
        <div class="col-sm-2 col-6 my-sm-3 my-2">
            <label>Buscar servicio:</label>
            <input id="cercador" class="form-control" type="text">
        </div>
    </div>
    <form class="d-flex flex-column justify-content-center gap-4" method="POST" action="{{route('user.store')}}">
        @csrf
        <div class="row justify-content-center mt-4">
            <div class="form-group mb-sm-1 mb-3 col-sm-5 col-12">
                <label for="mascotas">{{__('Mascotas')}}:</label>
                <input required type="text" class="form-control" name="mascotas" value="" aria-label="correo electronico" placeholder="{{__('Correo electrónico')}}">
            </div>
            <div class="form-group mb-sm-1 mb-0 col-sm-5 col-12">
                <label for="fumar">{{__('Fumar')}}:</label>
                <input required id="pass" type="text" class="form-control" value="" name="fumar" placeholder="Contraseña">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group mb-sm-1 mb-3 col-sm-5 col-12">
                <label for="visitas">{{__('Visitas')}}:</label>
                <input required type="text" class="form-control" value="" name="visitas" placeholder="{{__('Nombre')}}">
            </div>
            <div class="form-group mb-sm-1 mb-0 col-sm-5 col-12">
                <label for="fiestas">{{__('Fiestas')}}:</label>
                <input required type="text" class="form-control" value="" name="fiestas" placeholder="{{__('Primer apellido')}}">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group mb-sm-1 mb-3 col-sm-5 col-12">
                <label for="entrada">{{__('Horario de llegada')}}:</label>
                <input type="text" class="form-control" value="" name="entrada" placeholder="{{__('Segundo apellido')}}">
            </div>
            <div class="form-group mb-sm-1 mb-0 col-sm-5 col-12">
                <label for="salida">{{__('Horario de salida')}}:</label>
                <input required type="tel" class="form-control" value="" name="salida" placeholder="{{__('Teléfono')}}">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group mb-sm-1 mb-3 col-sm-4 col-12">
                <label for="addressInput">{{__('Dirección')}}:</label>
                <input required type="text" class="form-control" value="" name="direccio" placeholder="{{__('Dirección')}}">
            </div>
            <div class="form-group mb-sm-1 mb-0 col-sm-3 col-6">
                <label for="ciutat">{{__('Ciudad')}}</label>
                <select id="city" required name="ciutat_id" class="form-control">

                </select>
            </div>
            <div class="form-group mb-sm-2 mb-0 col-sm-3 col-6">
                <label for="pais">{{__('País')}}</label>
                <select required name="pais_id" class="form-control">

                </select>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="text-end col-10">
                <button type="submit" class="btn btn-primary">{{__('Enviar')}}</button>
            </div>
        </div>
    </form>
    <script>


        let allServices = [];
        let allServicesByProperty = [];

        $(document).ready(function (){

            const url = window.location.href;
            const match = url.match(/\/property\/(\d+)\/property\/\d+\/servicios/);

            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/serviciosAjax`
            }).done(function (service) {
                console.log(service)
                allServices.push.apply(allServices, service);
                $.ajax({
                    method: 'GET',
                    url: `http://localhost:8100/serviciosByProperty/${match[1]}`
                }).done(function (service) {
                    console.log(service)
                    allServicesByProperty.push.apply(allServicesByProperty, service);
                    printServicios();
                });
            });

            $.ajax({
                method: 'GET',
                url: '{{ route('property.traduccions') }}',
                data: {
                    "nom": "{{ $propietat -> nom }}",
                }
            }).done(function (traduccions) {
                const nomTraduit = traduccions[0].filter((tr) => tr.lang === "{{ app() -> getLocale() }}")[0].value;
                $("li:nth-child(4)").html(nomTraduit);
            });
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

                let labelNumber = $('<label>').addClass('form-label pt-1').text('Cuantos hay ');
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
