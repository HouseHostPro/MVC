<!-- Este trozo de codigo es para que me cuente solo las reseñas de la propiedad(que no me cuente las respuestas de las reseñas) -->
@php
    $count = 0;
@endphp
@foreach($comentarios as $comentario)
    @if($comentario->fa_contesta === 'F')
        @php
            $count++;
        @endphp
    @endif
@endforeach

<div class="col-xl-2 col-sm-1 col-3 me-2 me-xl-0 ">
    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
    </svg>
</div>
<div class="col-8 ps-0 d-flex align-self-center">
    <h5>{{__('Anfitrión')}}: Lucas</h5>
</div>
<div id="totalComentarios" class="col-12">
    <p class="mb-0"><span id="star-anfitrion" class="star fs-3">&#9733;</span>@php echo $count; @endphp reseñas</p>
</div>
<div class="col-12">
    <p>Idioma: Español</p>
</div>

<div class="col-12">
    <p>
        La casita una monada, súper cómoda y acogedora.
        Los alrededores preciosos.
        Carlos es un anfitrión maravilloso, atento y nos facilitó todo mucho. Disfrutamos muchísimo.
    </p>
</div>
