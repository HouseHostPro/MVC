@extends('layouts/plantillaFormularios')

@section('url')
    {{ url() -> previous() }}
@endsection
@section('content')
    <input type="text" id="datePicker" name="datePicker" value=""/>

    <script>

        const dates = ["20/02/2024", "21/02/2024", "22/02/2024", "25/02/2024"];

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


        /*$('#datePicker').datepicker({
            changeMonth: true,
            changeYear: true,
            minDate: 0,
            //The calendar is recreated OnSelect for inline calendar
            onSelect: function (date, dp) {
                updateDatePickerCells();
            },
            onChangeMonthYear: function(month, year, dp) {
                updateDatePickerCells();
            },
            beforeShow: function(elem, dp) { //This is for non-inline datepicker
                updateDatePickerCells();
            }
        });


        updateDatePickerCells();
        function updateDatePickerCells(dp) {
            /* Wait until current callstack is finished so the datepicker
               is fully rendered before attempting to modify contents */
            /*setTimeout(function () {
                //Fill this with the data you want to insert (I use and AJAX request).  Key is day of month
                //NOTE* watch out for CSS special characters in the value
                var cellContents = {1: '20', 15: '60', 28: '$99.99'};

                //Select disabled days (span) for proper indexing but // apply the rule only to enabled days(a)
                $('.ui-datepicker td > *').each(function (idx, elem) {
                    var value = cellContents[idx + 1] || 0;

                    // dynamically create a css rule to add the contents //with the :after
                    //             selector so we don't break the datepicker //functionality
                    var className = 'datepicker-content-' + value;

                    if(value == 0)
                        addCSSRule('.ui-datepicker td a.' + className + ':after {content: "\\a0";}'); //&nbsp;
                    else
                        addCSSRule('.ui-datepicker td a.' + className + ':after {content: "' + value + '";}');

                    $(this).addClass(className);
                });
            }, 0);
        }
        var dynamicCSSRules = [];
        function addCSSRule(rule) {
            if ($.inArray(rule, dynamicCSSRules) == -1) {
                $('head').append('<style>' + rule + '</style>');
                dynamicCSSRules.push(rule);
            }
        }*/
    </script>
@endsection







