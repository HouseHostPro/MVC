<div class="row col-12">
    <div class="col-12 text-end my-2">
        <button type="button" class="btn btn-white border-0 text-black text-decoration-underline" data-bs-toggle="modal" data-bs-target="#crearComenatrio"><span class="fw-bold">{{__('Añadir comentario')}}</span></button>
    </div>
    <div class="modal-body row justify-content-between">
        @php
            $count = 0;
        @endphp
        @foreach($comentarios as $comentario)
            @if($count > 5)
                @break
            @endif
            @if($comentario->fa_contesta === 'F')
                <div class="col-sm-6 col-12 mt-4">
                    <div class="row">
                        <div class="col-sm-2 col-3 me-md-2 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </div>
                        <div class="col-8 ps-0">
                            <h5>{{$comentario->user->nom}}</h5>
                            <p style="font-size: 12px">{{$comentario->user->ciutat->nom}}, {{$comentario->user->ciutat->pais->nom}}</p>
                        </div>
                        @auth
                            @if($comentario->user->email === Auth::user()->email)
                                <div class="col-1">
                                    <form method="post" action="{{route('comentario.delete')}}">
                                        @csrf
                                        <button type="submit" class="btn bg-white border-black">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                        </button>
                                        <input type="text" name="idTc" value="{{$comentario->tc_id}}" hidden>
                                        <input type="text" name="estat" value="{{$comentario->fa_contesta}}" hidden>
                                    </form>
                                </div>
                            @endif
                        @endauth
                        <div class="col-12 rating-container" data-rating="{{$comentario->puntuacio}}">
                            <div class="rating" >
                                <span class="star" data-rating="1">&#9733;</span>
                                <span class="star" data-rating="2">&#9733;</span>
                                <span class="star" data-rating="3">&#9733;</span>
                                <span class="star" data-rating="4">&#9733;</span>
                                <span class="star" data-rating="5">&#9733;</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="text-truncate">
                                {{$comentario->comentari}}
                            </p>
                        </div>
                    </div>
                </div>
                @php
                    $count++;
                @endphp
            @endif
        @endforeach
    </div>
    <div class="col-sm-4 col-6 ">
        <button type="button" class="btn bg-white border border-dark my-3" data-bs-toggle="modal" data-bs-target="#comenarios">{{__('Mostrar más')}}</button>
    </div>
</div>
