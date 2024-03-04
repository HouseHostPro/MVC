@extends('layouts.plantillaFormularios')

@section('url')
    {{route('cuenta', ['id' => $propietat -> id])}}
@endsection
@section('title',__('Espacios'))
@section('content')
    <div class="row col-12 justify-content-between">
        <nav class="mt-3 col-sm-7 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $propietat -> id])}}">{{__('Principal')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $propietat -> id])}}">{{__('Cuenta')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.properties', ['id' => $propietat -> id])}}">{{__('Propiedades')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('property.edit', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}">{{$propietat->nom}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Espacios')}}</li>
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
                            <form action="{{route('saveEspacios', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}" method="post" class="row col-12 ps-4 justify-content-end">
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


        let allEspacios = [];
        let allEspaciosByProperty = [];

        $(document).ready(function (){
            const url = window.location.href;
            const match = url.match(/\/property\/(\d+)\/property\/\d+\/espacios/);


            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/allEspaciosAjax`
            }).done(function (espacios) {
                console.log(espacios);
                allEspacios.push.apply(allEspacios, espacios);
                $.ajax({
                    method: 'GET',
                    url: `http://localhost:8100/allEspaciosByPropertyAjax/${match[1]}`
                }).done(function (espacios) {
                    console.log(espacios);
                    allEspaciosByProperty.push.apply(allEspaciosByProperty, espacios);
                    printEspacios();
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


        function printEspacios(){

            $('#tabla').html("");

            allEspacios.forEach( function (value){

                let fila = $('<tr>');
                let columnName = $('<td>').addClass('text-center');

                let pNom = $('<p>').text(value.tipus).addClass('pt-1');
                columnName.append(pNom);
                fila.append(columnName);

                let columnDesc = $('<td>').addClass('text-center');

                //QUITAR QUE SE CREEN DORMITORIOS Y PONER 3 DORMITORIOS CON LOS TRES TIPOS DIFERENTES DE CAMAS Y UN INPUTNUMBER COMO LOS DEMAS
                if(value.tipus === "Dormitorio"){
                    let selectLabel = $('<label>').addClass('form-label pt-1').text('Selecciona el tipo de camas');
                    let selectDesc = $('<select>').addClass('select-desc form-select w-50 ms-3');
                    let opciones = ['Cama doble', 'Cama individual', '2 camas individuales'];


                    opciones.forEach(function(opcion) {
                        selectDesc.append($('<option>').text(opcion).val(opcion));
                    });
                    let contenedorSelect = $('<div>').addClass('d-flex align-items-center');
                    contenedorSelect.append(selectLabel, selectDesc);

                    columnDesc.append(contenedorSelect);

                    //Creo un evento en el select, para cuando se eliga un elemnto se inserte una fila debajo del elemento
                    selectDesc.on('change', function() {
                        let valorSeleccionado = $(this).val();
                        if (valorSeleccionado) {
                            let nuevaFila = $('<tr>');
                            let nuevaColumna = $('<td>').addClass('text-center');
                            let nomP = $('<p>').text('Dormitorio');
                            nuevaColumna.append(nomP);
                            let nuevaColumnaDesc = $('<td>').addClass('text-center');
                            let nomDesc = $('<p>').text(valorSeleccionado);
                            nuevaColumnaDesc.append(nomDesc);
                            let columnCheckbox = $('<td>').addClass('text-center');
                            let chechkbox = $('<input>').attr({
                                type: 'checkbox',
                                name: `s-${value.id}`,
                                value: value.id
                            }).addClass('form-check-input dormitorio').prop('checked',true);
                            columnCheckbox.append(chechkbox);
                            nuevaFila.append(nuevaColumna, nuevaColumnaDesc,columnCheckbox);
                            // Agregar la nueva fila debajo de la fila actual
                            $(this).closest('tr').after(nuevaFila);

                            //Elimina un dormitorio cuando se desmarca el checkbox
                            $('.dormitorio').on('change', function() {
                                if (!$(this).prop('checked')) {
                                    $(this).closest('tr').remove();
                                }
                            });
                        }
                    });


                }else {
                    let labelNumber = $('<label>').addClass('form-label pt-1').text('Cuantos hay ');
                    let inputNumber = $('<input>').attr({
                        type: 'number',
                        min: 0,
                        name: `s-${value.id}`,
                        value: 0
                    }).addClass('form-control input-number ms-3 w-25');

                    let contenedorInput = $('<div>').addClass('d-flex justify-content-center');
                    contenedorInput.append(labelNumber, inputNumber);
                    columnDesc.append(contenedorInput);


                    // Evento que cuando el valor no sea cero se active el checkbox
                    inputNumber.on('change', function() {
                        let checkbox = $(this).closest('tr').find('input[type="checkbox"]');
                        if ($(this).val() != 0) {
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
                        }
                    });
                }


                let inputHidden = $('<inpunt>').attr({
                    type: 'hidden',
                    name: 'id' + value.id,
                    value: value.id
                })
                columnDesc.append(inputHidden);

                fila.append(columnDesc);

                let columnCheckbox = $('<td>').addClass('text-center');
                let chechkbox = $('<input>').attr({
                    type: 'checkbox',
                    name: `s-${value.id}`,
                    value: value.id
                }).addClass('form-check-input');
                if(value.tipus === "Dormitorio"){
                    chechkbox.attr('id','dormitorio')
                }

                allEspaciosByProperty.forEach( function (espai){
                    if(espai.espaid_id === value.id){
                        chechkbox.prop('checked',true);
                    }
                })

                $('#dormitorio').hide();
                columnCheckbox.append(chechkbox);
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
