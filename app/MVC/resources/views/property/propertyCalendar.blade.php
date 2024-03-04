@extends('layouts/plantillaFormularios')

@section('title')
    <h2>{{__('Precio por día')}}</h2>
@endsection
@section('url')
    {{ url() -> previous() }}
@endsection
@section('content')

    @include('sweetalert::alert')

    <div class="container-fluid pt-4" id="contenedor">
        <form method="post" action='{{ route('property.saveCalendar', ['id' => $PROPIETAT_ID, 'prop_id' => intval(explode("/", url() -> current())[7])  ]) }}'>
            @csrf
            <input type="text" id="datePicker" name="datePicker" value=""/>
            <div id="preuInput"></div>
        </form>
    </div>


    <script>

        const dates = [];
        const preusTemporada = {!! json_encode($temporades -> toArray()) !!};
        const propietatId = $(location).attr('href').split('/')[5];

        console.log(preusTemporada);

        $.ajax({
            method: 'GET',
            url: `http://localhost:8100/property/edit/${propietatId}/reserves/dates`
        }).done(function (reserves) {
            reserves.forEach(reserva => reserva.forEach(data => dates.push(data)));
        });

        // calendari

        $("#datePicker").datepicker({
            dateFormat: "dd/mm/yy",
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            numberOfMonths: 1,
            showAnim: "show",
            beforeShowDay: function (date) {
                $(".ui-datepicker-calendar").addClass("cellSize");
                const string = jQuery.datepicker.formatDate('dd/mm/yy', date);
                return [dates.indexOf(string) == -1]
                    ? [true, '', '{{ $preuBase }}€']
                    : [true, 'event', '{{ $preuBase }}€'];
            },

            // selecciona rang de dates
            onSelect: function( selectedDate ) {
                if(!$(this).data().datepicker.first) {

                    $(this).data().datepicker.inline = true
                    $(this).data().datepicker.first = selectedDate;
                }

                else {
                    if(selectedDate > $(this).data().datepicker.first){
                        $(this).val($(this).data().datepicker.first+" - "+selectedDate);
                        setPriceInput();
                    }else{
                        $(this).val(selectedDate+" - "+$(this).data().datepicker.first);
                        setPriceInput();
                    }
                    $(this).data().datepicker.inline = false;
                }
            },

            onClose: function(){
                delete $(this).data().datepicker.first;
                $(this).data().datepicker.inline = false;
            }
        });

        function setPriceInput() {
            /*const form = document.createElement('form');
            const missatge = document.createElement('p');
            missatge.innerHTML = '{{ __('Introduce el precio de esta franja horario') }}';

            const preu = document.createElement('input');
            preu.type = "text";
            preu.inputmode = "numeric";

            const add = document.createElement('button');
            add.innerHTML = 'Guardar';
            form.method = 'post';
            form.action =
            form.append(missatge);
            form.append(preu);
            form.append(add);

            $('#preuInput').html('').append(form);*/

            const missatge = document.createElement('p');
            missatge.innerHTML = '{{ __('Introduce el precio de esta franja horaria') }}';

            const preu = document.createElement('input');
            preu.type = "text";
            preu.inputmode = "numeric";
            preu.name = "preu";

            const add = document.createElement('button');
            add.innerHTML = 'Guardar';

            $('#preuInput').html('').append(missatge);
            $('#preuInput').append(preu);
            $('#preuInput').append(add);
        }

        $( document ).ready(function() {
            $('#ui-datepicker-div').addClass('calendari');
            $('#datePicker').datepicker( "show" );
        });

    </script>

@endsection
