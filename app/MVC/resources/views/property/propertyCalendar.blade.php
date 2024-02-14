@extends('layouts/plantillaFormularios')

@section('content')
    <div id="calendar"></div>
@endsection

<script src="https://code.jquery.com/jquery-3.4.1.min.js">
    $(document).ready(function(){
        const red = ["2017-08-02","2017-08-04","2017-08-06"];
        const yellow = ["2017-08-09"];
        const green = ["2017-08-10","2017-08-11"];

        $("#calendar").datepicker({
            defaultDate: '08/07/2017',      // Just for this demo longevity on SO ;)

            beforeShowDay: function(date){
                const dateISO = $.datepicker.formatDate('yy-mm-dd', date);
                //console.log(dateISO);

                if(red.indexOf(dateISO)>-1){
                    return [true,"red"]        // Enabled, class
                }
                if(yellow.indexOf(dateISO)>-1){
                    return [true,"yellow"]
                }
                if(green.indexOf(dateISO)>-1){
                    return [true,"green"]
                }
                return [true]  // If not found, must at least return the enabled boolean.
            }
        });
    });
</script>
