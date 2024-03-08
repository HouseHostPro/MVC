@extends('layouts/plantillaFormularios')

@section('title')
    <h2>{{__('Disponibilidad y precios')}}</h2>
@endsection
@section('url')
    {{ url() -> previous() }}
@endsection
@section('content')

    @include('sweetalert::alert')

    <nav class="mt-3 col-sm-7 col-12" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('principal', ['id' => $propietat -> id])}}">{{__('Principal')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('cuenta', ['id' => $propietat -> id])}}">{{__('Cuenta')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('property.properties', ['id' => $propietat -> id])}}">{{__('Propiedades')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('property.edit', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}">{{$propietat->nom}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('Disponibilidad y precios')}}</li>
        </ol>
    </nav>

    <div class="row col-12 justify-content-between" id="contenedor">
        <div id="calendari-casa" class="col-sm-6 col-12">
            <div id="inline-picker-form" class="col-12 my-3"></div>
        </div>
        <div class="col-sm-5 col-12 row">
            <form class="col-12 d-flex flex-column justify-content-end mb-5" method="post" action='{{ route('savePriceForDay', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat->id])}}'>
                @csrf
                <div class="row justify-content-center">
                    <div class="form-group row mb-sm-1 mb-3 col-8">
                        <div class="col-sm-5 col-auto d-flex align-items-center">
                            <label for="precio_dia">{{__('Precio por día')}}:</label>
                        </div>
                        <div class="col-sm-4 col-auto">
                            <input type="number" class="form-control" id="precio_dia" value="" name="precio_dia">
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn bg-primary bg-opacity-75">{{__('Guardar')}}</button>
                    </div>
                </div>
            </form>
            <form class="col-12" method="post" action='{{ route('saveDisableDays', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat->id])}}'>
                @csrf
                <div class="row justify-content-around">
                    <div class="form-group row mb-sm-1 mb-3 col-sm-5 col-12">
                        <div class="col-auto d-flex align-items-center">
                            <label for="from">{{__('Fecha inicio')}}:</label>
                        </div>
                        <div class="col-auto mt-1">
                            <input type="text" id="from" name="from" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row mb-sm-1 mb-0 col-sm-5 col-12">
                        <div class="col-auto d-flex align-items-center">
                            <label for="to">{{__('Fecha fin')}}:</label>
                        </div>
                        <div class="col-auto mt-1">
                            <input type="text" id="to" name="to" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-around">
                    <div class="form-group row mb-sm-1 mb-3 col-10 mt-4 justify-content-around">
                        <div class="form-check form-switch mb-sm-1 mb-3 col-sm-5 col-12 d-flex justify-content-center">
                            <input class="form-check-input" type="checkbox" name="fecha_deshabilitada" value="Si" id="fecha_deshabilitada" required>
                            <label class="form-check-label" for="fecha_deshabilitada">{{__('Deshabilitar días')}}</label>
                        </div>
                    </div>
                    <div class="form-group row mb-sm-1 mb-3 col-6 mt-4 justify-content-center">
                        <button type="submit" class="btn bg-primary bg-opacity-75">{{__('Guardar')}}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-12 mt-2">
            <h4>Periodos no disponibles</h4>
            <ul>
                @if($disableDays !== null)
                    @foreach($disableDays as $day)
                        @for($i = 0; $i < 1; $i++)
                            <form method="post" action='{{ route('deleteDisableDays', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat->id]) }}'>
                                @csrf
                                <li class="justify-content-start mt-2">
                                    <span>{{ $day[0] }} - {{ $day[count($day)-1] }}</span>

                                <button type="submit" class="btn bg-danger bg-opacity-50 ms-2 pt-1 pb-1 p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                                </li>
                                <input type="hidden" name="fecha_inicio" value="{{ $day[0] }}">
                            </form>
                        @endfor
                    @endforeach
                @endif
            </ul>
        </div>
    </div>


    <script>

        $(document).ready(function() {
            $.ajax({
                method: 'GET',
                url: `http://localhost:8100/allDatesReservades/{{$PROPIETAT_ID}}`
            }).done(function (reservas) {
                allReservas = reservas;
                pintalCalendario(reservas);
                pintarCalendarioFrom(reservas);
                pintarCalendarioTo(reservas);
            });
        })


        //Date-picker
        function pintarCalendarioFrom(reservas){
            $(function () {
                $("#from").datepicker({
                    dateFormat: "dd/mm/yy",
                    altField: '#entrada',
                    altFormat: 'yy-mm-dd',
                    minDate: 0,
                    firstDay: 1,
                    changeMonth: true,
                    monthNames: ['{{__('Enero')}}', '{{__('Febrero')}}', '{{__('Marzo')}}', '{{__('Abril')}}', '{{__('Mayo')}}', '{{__('Junio')}}', '{{__('Julio')}}', '{{__('Agosto')}}', '{{__('Septiembre')}}', '{{__('Octubre')}}', '{{__('Noviembre')}}', '{{__('Diciembre')}}'],
                    monthNamesShort: ['{{__('Ene')}}', '{{__('Feb')}}', '{{__('Mrz')}}', '{{__('Abr')}}', '{{__('May')}}', '{{__('Jun')}}', '{{__('Jul')}}', '{{__('Ago')}}', '{{__('Sep')}}', '{{__('Oct')}}', '{{__('Nov')}}', '{{__('Dic')}}'],
                    dayNames: ['{{__('Domingo')}}', '{{__('Lunes')}}', '{{__('Martes')}}', '{{__('Miércoles')}}', '{{__('Jueves')}}', '{{__('Viernes')}}', '{{__('Sábado')}}'],
                    dayNamesShort: ['{{__('Dom')}}', '{{__('Lun')}}', '{{__('Mar')}}', '{{__('Mié')}}', '{{__('Jue')}}', '{{__('Vie')}}', '{{__('Sáb')}}'],
                    dayNamesMin: ['{{__('Do')}}', '{{__('Lu')}}', '{{__('Ma')}}', '{{__('Mi')}}', '{{__('Ju')}}', '{{__('Vi')}}', '{{__('Sá')}}'],
                    beforeShowDay: function (date) {

                        const string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                        return jQuery.inArray(string, reservas) == -1
                            ? [true, '', '{{ $preuBase }}€']
                            : [false, 'event', '{{ $preuBase }}€'];
                    }
                });
            });
        }

        function pintarCalendarioTo(reservas) {
            $(function () {
                $("#to").datepicker({
                    dateFormat: "dd/mm/yy",
                    altField: '#sortida',
                    altFormat: 'yy-mm-dd',
                    minDate: 0,
                    firstDay: 1,
                    changeMonth: true,
                    monthNames: ['{{__('Enero')}}', '{{__('Febrero')}}', '{{__('Marzo')}}', '{{__('Abril')}}', '{{__('Mayo')}}', '{{__('Junio')}}', '{{__('Julio')}}', '{{__('Agosto')}}', '{{__('Septiembre')}}', '{{__('Octubre')}}', '{{__('Noviembre')}}', '{{__('Diciembre')}}'],
                    monthNamesShort: ['{{__('Ene')}}', '{{__('Feb')}}', '{{__('Mrz')}}', '{{__('Abr')}}', '{{__('May')}}', '{{__('Jun')}}', '{{__('Jul')}}', '{{__('Ago')}}', '{{__('Sep')}}', '{{__('Oct')}}', '{{__('Nov')}}', '{{__('Dic')}}'],
                    dayNames: ['{{__('Domingo')}}', '{{__('Lunes')}}', '{{__('Martes')}}', '{{__('Miércoles')}}', '{{__('Jueves')}}', '{{__('Viernes')}}', '{{__('Sábado')}}'],
                    dayNamesShort: ['{{__('Dom')}}', '{{__('Lun')}}', '{{__('Mar')}}', '{{__('Mié')}}', '{{__('Jue')}}', '{{__('Vie')}}', '{{__('Sáb')}}'],
                    dayNamesMin: ['{{__('Do')}}', '{{__('Lu')}}', '{{__('Ma')}}', '{{__('Mi')}}', '{{__('Ju')}}', '{{__('Vi')}}', '{{__('Sá')}}'],
                    beforeShowDay: function (date) {

                        const string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                        return jQuery.inArray(string, reservas) == -1
                            ? [true, '', '{{ $preuBase }}€']
                            : [false, 'event', '{{ $preuBase }}€'];
                    }
                });
            });
        }
        //Me devuelve el primer dia de la fecha más cercana, a partir de la fecha que le doy
        function fechasMasCercana(fecha, fechasArray) {
            // Convertir la fecha de entrada en milisegundos
            let fechaEntrada = new Date(fecha).getTime();

            // Ordenar el array de fechas

            fechasArray.sort(function(a, b) {
                return new Date(a) - new Date(b);
            });

            let fechaMasCercana;

            // Encontrar la fecha más cercana a la fecha de entrada
            let fechaCercana;
            for (let i = 0; i < fechasArray.length; i++) {
                let fechaActual = new Date(fechasArray[i]).getTime();
                if (fechaActual >= fechaEntrada) {
                    fechaCercana = new Date(fechasArray[i]);
                    break;
                }
            }
            // Encontrar las fechas entre la fecha de entrada y la fecha más cercana
            for (let i = 0; i < fechasArray.length; i++) {
                let fechaActual = new Date(fechasArray[i]).getTime();
                if (fechaActual >= fechaEntrada && fechaActual <= fechaCercana.getTime()) {
                    fechaMasCercana = new Date(fechasArray[i]);
                }else {
                    fechaMasCercana = null;
                }
            }
            if (fechaMasCercana !== null) {
                return dateRange(fecha,fechaMasCercana);
            } else {
                return null; // No se encontró ninguna fecha en el pasado
            }
        }


        function encontrarFechaMasCercanaEnPasado(fechaEntrada, fechasArray) {
            // Convertir la fecha de entrada al formato mm/dd/yyyy
            let partesFechaEntrada = fechaEntrada.split('/');
            let diaEntrada = partesFechaEntrada[0];
            let mesEntrada = partesFechaEntrada[1];
            let anioEntrada = partesFechaEntrada[2];
            let fechaEntradaFormatoCorrecto = mesEntrada + '/' + diaEntrada + '/' + anioEntrada;

            // Convertir la fecha de entrada a un objeto Date
            let fechaObjEntrada = new Date(fechaEntradaFormatoCorrecto);

            // Inicializar la fecha más cercana en el pasado
            let fechaMasCercana = null;

            // Iterar sobre el array de fechas
            for (let i = 0; i < fechasArray.length; i++) {
                // Convertir la fecha del array al objeto Date
                let fechaObjArray = new Date(fechasArray[i]);

                // Si la fecha del array está en el pasado y es más cercana que la actual
                if (fechaObjArray < fechaObjEntrada && (fechaMasCercana === null || fechaObjArray > fechaMasCercana)) {
                    fechaMasCercana = fechaObjArray;
                }
            }

            // Devolver la fecha más cercana en el formato mm/dd/yyyy
            if (fechaMasCercana !== null) {

                let mesMasCercano = ('0' + (fechaMasCercana.getMonth() + 1)).slice(-2);
                let diaMasCercano = ('0' + fechaMasCercana.getDate()).slice(-2);
                let anioMasCercano = fechaMasCercana.getFullYear();

                const fechaFormateada =  mesMasCercano + '/' + diaMasCercano + '/' + anioMasCercano;

                return dateRange(fechaFormateada,fechaObjEntrada);
            } else {
                return null; // No se encontró ninguna fecha en el pasado
            }
        }


        function dateRange(startDate, endDate, steps = 1) {
            const dateArray = [];
            let currentDate = new Date(startDate);

            while (currentDate < endDate) {
                let fechaOriginal = new Date(currentDate);

                let mes = fechaOriginal.getMonth() + 1; // Se suma 1 porque los meses van de 0 a 11
                let dia = fechaOriginal.getDate();
                let anio = fechaOriginal.getFullYear();

                // Formatear la fecha como "mm/dd/yyyy"
                let fechaFormateada = (mes < 10 ? '0' : '') + mes + '/' + (dia < 10 ? '0' : '') + dia + '/' + anio;

                dateArray.push(fechaFormateada);
                // Use UTC date to prevent problems with time zones and DST
                currentDate.setUTCDate(currentDate.getUTCDate() + steps);
            }
            return dateArray;
        }

        //Formulario de reserva
        //Para poner la fecha de entrada, y en caso de haber puesto primero la de salida llamar a la función pintar
        $('#from').change(function () {
            startDate = $(this).datepicker('getDate');

            //Aqui Fomateo la fecha de dd/mm/yyyy a mm/dd/yyy
            let fechaSplit = $('#from').val().split('/');
            let fechaFormateada = fechaSplit[1] + '/' + fechaSplit[0] + '/' + fechaSplit[2];
            //Llamo al datepicker para pasarle la fecha que he puesto, y dehabilite todo lo anteiror
            $("#to").datepicker("option", "minDate", startDate);

            if(fechasMasCercana(fechaFormateada,allReservas) !== null) {
                console.log('el valor es null')


                //Llamo al datepicker para pasarle la fecha que he puesto y me deshabilite todas las fechas desde el primer dia de la reserva más cercana
                $("#to").datepicker("option", "beforeShowDay", function (date) {

                    const string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                    return jQuery.inArray(string, fechasMasCercana(fechaFormateada, allReservas)) == -1
                        ? [false, '', '']
                        : [true, '', '{{ $preuBase }}€'];
                })
            }

            if ($('#to').val() !== "") {
                pintarprecioReserva();
            }

        })

        //Para pponer la fecha de salida, y en caso de haber puesto primero la de entrada llamar a la función pintar
        $('#to').change(function () {

            //Aqui quita la primera fecha del array(no tiene que estar), y después le añado la que he clicado(tiene que estar)
            let arrayFechas = encontrarFechaMasCercanaEnPasado($('#to').val(),allReservas);
            startDate = new Date(arrayFechas.shift());
            //Aqui Fomateo la fecha que he cogido con el input de dd/mm/yyyy a mm/dd/yyy
            let fechaSplit = $('#to').val().split('/');
            let fechaFormateada = fechaSplit[1] + '/' + fechaSplit[0] + '/' + fechaSplit[2];
            arrayFechas.push(fechaFormateada);
            console.log("Esto es el from" + encontrarFechaMasCercanaEnPasado($('#to').val(),allReservas));

            //Llamo al datepicker para pasarle la fecha que he puesto, y dehabilite todo lo de después
            endDate = $(this).datepicker('getDate');
            //Para que se dehabiliten los dias de delante de la primer comando, y los dias de atras del segundo comando
            $("#from").datepicker("option", "maxDate", endDate);
            $("#from").datepicker("option", "minDate", startDate);

            //Llamo al datepicker para pasarle la fecha que he puesto y me deshabilite todas las fechas desde el primer dia de la reserva más cercana

            $("#to").datepicker("option","beforeShowDay", function (date){

                const string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                return jQuery.inArray(string, arrayFechas) == -1
                    ? [false, '', '']
                    : [true, '', '{{ $preuBase }}€'];
            })

            if ($('#from').val() !== "") {

                pintarprecioReserva();
            }

        })

        //Pinta los precios del coste de los dias reservados, limpieza y el total
        function pintarprecioReserva() {

            //Calcular días de diferencia entre fecha entrada y salida
            let entrada = new Date($('#entrada').val());
            let salida = new Date($('#sortida').val());
            let diffMs = Math.abs(salida - entrada);
            let diffDays = Math.ceil(diffMs / (1000 * 60 * 60 * 24));

            if (diffDays > 0) {
                $('#divpxn').prop("hidden", false);
                let preuTotal = 150 * diffDays;
                $('#pxn').text(150 + "€ x " + diffDays + " noches");
                $('#pxnt').val(preuTotal + "€");
                $('#ptotal').val(preuTotal + "€");
                $('#days').val(diffDays);

            }
        }

        //Calendar

        function adjustNumberOfMonths() {
            if ($(window).width() < 1140) {
                $('#inline-picker-form').datepicker('option', 'numberOfMonths', 1);
            } else {
                $('#inline-picker-form').datepicker('option', 'numberOfMonths', 2);
            }
        }


        function pintalCalendario(reservas) {
            $('#inline-picker-form').datepicker({
                controls: ['calendar'],
                display: 'inline',
                touchUi: true,
                monthNames: ['{{__('Enero')}}', '{{__('Febrero')}}', '{{__('Marzo')}}', '{{__('Abril')}}', '{{__('Mayo')}}', '{{__('Junio')}}', '{{__('Julio')}}', '{{__('Agosto')}}', '{{__('Septiembre')}}', '{{__('Octubre')}}', '{{__('Noviembre')}}', '{{__('Diciembre')}}'],
                monthNamesShort: ['{{__('Ene')}}', '{{__('Feb')}}', '{{__('Mrz')}}', '{{__('Abr')}}', '{{__('May')}}', '{{__('Jun')}}', '{{__('Jul')}}', '{{__('Ago')}}', '{{__('Sep')}}', '{{__('Oct')}}', '{{__('Nov')}}', '{{__('Dic')}}'],
                dayNames: ['{{__('Domingo')}}', '{{__('Lunes')}}', '{{__('Martes')}}', '{{__('Miércoles')}}', '{{__('Jueves')}}', '{{__('Viernes')}}', '{{__('Sábado')}}'],
                dayNamesShort: ['{{__('Dom')}}', '{{__('Lun')}}', '{{__('Mar')}}', '{{__('Mié')}}', '{{__('Jue')}}', '{{__('Vie')}}', '{{__('Sáb')}}'],
                dayNamesMin: ['{{__('Do')}}', '{{__('Lu')}}', '{{__('Ma')}}', '{{__('Mi')}}', '{{__('Ju')}}', '{{__('Vi')}}', '{{__('Sá')}}'],
                minDate: 0,
                numberOfMonths: 2,
                firstDay: 1,
                beforeShowDay: function (date) {

                    const string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                    return jQuery.inArray(string, reservas) == -1
                        ? [true, '', '{{ $preuBase }}€']
                        : [true, 'event', ''];

                }
            });


            $(window).resize(function () {
                adjustNumberOfMonths();
            });

            adjustNumberOfMonths();
        }

        $('#atras').remove();
    </script>

@endsection
