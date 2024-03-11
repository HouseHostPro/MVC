<div class="row d-flex justify-content-center mt-3 ">
    <div class="col-12 row ">
        <label class="custom-input col-12 col-xl-6" for="from">
            <input class="border-1 form-control" type="text" id="from" name="from" autocomplete="off" required></br>
            <span class="ph">{{__('Llegada')}}:</span>
        </label>
        <label class="custom-input col-12 col-xl-6" for="to">
            <input class="border-1 form-control" type="text" id="to" name="to" autocomplete="off" required>
            <span class="ph">{{__('Salida')}}:</span>
        </label>
    </div>
    <div class="col-12 row justify-content-start my-3">
        <div class="col-5 col-xl-4">
            <label for="personas" class=" m-0" style="font-size: 18px">{{__('Huéspedes')}}:</label>
        </div>
        <button id="menos" type="button" class="col-2 col-xl-1  p-0 border-0 bg-white" disabled>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
            </svg>
        </button>
        <div class="col-2">
            <input id="personas" name="personas" value="1" class="form-control bg-white border-0 fs-5 text-center m-0 p-0" readonly required>
        </div>
        <button id="mas" type="button" class="col-2 col-xl-1 p-0 border-0 bg-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-circle " viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
        </button>
    </div>
    <div id="mascotas" class="col-12 justify-content-start ms-3 my-xl-3 ">
        <div class="form-check form-switch ps-5">
            <input class="form-check-input" type="checkbox" value="true" name="mascotas" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault" style="font-size: 18px">{{__('Mascotas')}}</label>
        </div>
    </div>
    <!-- Inputs con los formatos de hora del formato de la bbdd -->
    <input type="text" id="titolCasa" name="titol" value="Cas concos" hidden>
    <input type="text" id="days" name="days" hidden>
    <input type="text" id="entrada" name="frombd" hidden>
    <input type="text" id="sortida" name="tobd" hidden>
    <input type="text" id="usuari" name="usuari" hidden>
</div>
<div id="boton-reservar" class="d-flex justify-content-center">
    <button type="submit" class="col-6 btn bg-primary bg-opacity-25 border border-dark mt-3 mb-4">{{__('Reservar')}}</button>
</div>
<div id="divpxn" class="col-12 row mx-2" hidden>
    <div class="col-8">
        <label id="pxn" for="pxnt" class="col-12 pt-1"></label>
    </div>
    <div class="col-4">
        <input id="pxnt" name="pxn" class="bg-white border-0 form-control col-12 text-end" readonly>
    </div>
</div>
<div id="divlimpiza" class="col-12 row mx-2" hidden>
    <div class="col-4">
        <label id="limpieza" for="limpiezat" class="col-12 pt-1"></label>
    </div>
    <div class="col-6">
        <input id="limpiezat" name="limpieza" class="bg-white border-0 form-control col-12 text-end" readonly>
    </div>
</div>
<div class="row mx-2 border-top">
    <label for="ptotal" class="h5 col-8 my-3">{{__('Total')}}</label>
    <input id="ptotal" name="ptotal" class="bg-white border-0 h5 col-4 text-end my-3" readonly>
</div>
