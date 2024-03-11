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
    </div>
    <form id="form" class="d-flex flex-column justify-content-center gap-4" method="POST" action="{{route('saveNormas', ['id' => $PROPIETAT_ID, 'prop_id' => $propietat -> id])}}">
        @csrf
        <div class="row mt-4">
            <div class="form-check form-switch mb-sm-1 mb-3 col-sm-3 col-6 d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" name="mascotas" value="true" id="mascotas">
                <label class="form-check-label" for="mascotas">{{__('Mascotas')}}</label>
            </div>
            <div class="form-check form-switch mb-sm-1 mb-0 col-sm-3 col-6 d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" name="fumar" value="true" id="fumar">
                <label class="form-check-label" for="fumar">{{__('Fumar')}}</label>
            </div>
            <div class="form-check form-switch mb-sm-1 mb-3 col-sm-3 col-6 d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" name="visitas" value="true" id="visitas">
                <label class="form-check-label" for="visitas">{{__('Visitas')}}</label>
            </div>
            <div class="form-check form-switch mb-sm-1 mb-0 col-sm-3 col-6 d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" name="fiestas" value="true" id="fiestas" >
                <label class="form-check-label" for="fiestas">{{__('Fiestas')}}</label>
            </div>
        </div>
        <div class="row justify-content-around">
            <div class="form-group row mb-sm-1 mb-3 col-sm-5 col-12">
                <div class="col-auto d-flex align-items-center">
                    <label for="hora_entrada">{{__('Horario de llegada')}}:</label>
                </div>
                <div class="col-auto">
                    <input type="time" class="form-control" id="entrada" value="" name="hora_entrada" required>
                </div>
            </div>
            <div class="form-group row mb-sm-1 mb-0 col-sm-5 col-12">
                <div class="col-auto d-flex align-items-center">
                    <label for="hora_salida">{{__('Horario de salida')}}:</label>
                </div>
                <div class="col-auto">
                    <input type="time" class="form-control" id="salida" value="" name="hora_salida" required>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="form-group mb-sm-1 mb-0 col-sm-8 col-8">
                <input type="text" class="form-control" id="nuevaNorma" placeholder="{{__('Ingrese una nueva norma')}}">
            </div>
            <div class="form-group mb-sm-1 mb-0 col-sm-3 col-3">
                <button type="button" class="btn bg-primary" id="agregarNorma">{{__('Añadir Norma')}}</button>
            </div>
            <div class="form-group mb-sm-1 mt-4 mb-0 col-sm-10 col-12">
                <ul class="ps-0 d-flex flex-column gap-2" id="normasList">{{__('Normas')}}:

                </ul>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="text-end col-10">
                <button type="submit" class="btn btn-primary">{{__('Enviar')}}</button>
            </div>
        </div>
    </form>
    <script>

        $(document).ready(function (){

            const url = window.location.href;
            const match = url.match(/\/property\/(\d+)\/property\/\d+\/normas/);

            const host = location.host;
            $.ajax({
                method: 'GET',
                url: `http://${host}/allNormasByPropertyAjax/${match[1]}`
            }).done(function (normas) {

                printNormas(normas);
            });

            function printNormas(normas){

                normas.forEach( function (value){

                    if(value.clau === "mascotas" && value.valor === "true"){
                        $('#mascotas').prop('checked', true);
                    }else if(value.clau === "fiestas" && value.valor === "true"){
                        $('#fiestas').prop('checked', true);
                    }else if(value.clau === "visitas" && value.valor === "true"){
                        $('#visitas').prop('checked', true);
                    }else if(value.clau === "fumar" && value.valor === "true"){
                        $('#fumar').prop('checked', true);
                    }else if(value.clau === "hora_entrada"){
                        $('#entrada').val(value.valor);
                    }else if(value.clau === "hora_salida"){
                        $('#salida').val(value.valor);
                    }else if(value.clau.includes('norma')){
                        crearNorma(value.valor);
                    }
                })
            }

            let count = 0;
            $("#agregarNorma").click(function(){
                let nuevaNorma = $("#nuevaNorma").val().trim();
                if (nuevaNorma !== "") {
                    count++;

                    crearNorma(nuevaNorma);
                    // Vaciar el input de normas
                    $("#nuevaNorma").val("");
                }
            });

            function crearNorma(norma){

                // Crear un elemento li y un campo oculto
                let li = $("<li>").text(norma);
                let inputHidden = $("<input>", { type: "hidden", name: "norma_" + count, value: norma });
                let buttonEliminar = $("<button>").addClass('ms-2 pt-1  btn-sm btn bg-danger bg-opacity-50').click(function(){
                    $('input[type="hidden"][value="' + $(this).parent("li").text() + '"]').remove();
                    $(this).parent("li").remove();
                });
                let svg = $('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16"><path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/></svg>');

                buttonEliminar.append(svg);
                li.append(buttonEliminar);
                $("#normasList").append(li);
                $("#form").append(inputHidden);
            }

            $('#atras').remove();
        })
    </script>
@endsection
