@extends('layouts/plantillaFormularios')

@section('title')
    <h2>Calendario de reservas</h2>
@endsection
@section('url')
    {{ url() -> previous() }}
@endsection
@section('content')

    <div class="container-fluid pt-4" id="contenedor">
        <input type="text" id="datePicker" name="datePicker" value=""/>
    </div>


    <script>

        const dates = [];
        const propietatId = $(location).attr('href').split('/')[5];

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
                return [dates.indexOf(string) == -1];
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
                    }else{
                        $(this).val(selectedDate+" - "+$(this).data().datepicker.first);
                    }
                    $(this).data().datepicker.inline = false;
                }
            },

            onClose: function(){
                delete $(this).data().datepicker.first;
                $(this).data().datepicker.inline = false;
            }
        });

        $( document ).ready(function() {
            $('#ui-datepicker-div').addClass('calendari');
            $('#datePicker').datepicker( "show" );
        });

    </script>

@endsection
