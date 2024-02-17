@extends('layouts.plantillaFormularios');

@section('url')
    {{route('cuenta')}}
@endsection
@section('title',__('Comentarios'))
@section('content')
    <nav class="mt-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('cuenta')}}">{{__('Cuenta')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{__('Comentarios')}}</li>
        </ol>
    </nav>
    <div class="gradient-custom-1 ">
        <div class="mask d-flex align-items-center ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="table-responsive bg-white">
                            <table class="table mb-0 bg-white border-bottom border-dark">
                                <thead>
                                <tr class="text-center">
                                    <th>{{__('Nombre propiedad')}}</th>
                                    <th>{{__('Descripción')}}</th>
                                    <th>{{__('Puntuación')}}</th>
                                    <th>{{__('Acciones')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @for($i = 0; $i < count($comentarios);$i++)
                                    <tr class="text-center">
                                        <td>{{$comentarios[$i]->user->propiedad[$i]->nom}}</td>
                                        <td class="text-start">{{$comentarios[$i]->comentari}}</td>
                                        <td>
                                            <div class="col-12 rating-container" data-rating="{{$comentarios[$i]->puntuacio}}">
                                                <div class="rating" >
                                                    <span class="star" data-rating="1">&#9733;</span>
                                                    <span class="star" data-rating="2">&#9733;</span>
                                                    <span class="star" data-rating="3">&#9733;</span>
                                                    <span class="star" data-rating="4">&#9733;</span>
                                                    <span class="star" data-rating="5">&#9733;</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form method="get" action="{{route('comentario.delete')}}">
                                                @csrf
                                                <button type="submit" class="btn bg-danger bg-opacity-50">{{__('Eliminar')}}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @auth
        <script>
            $('#atras').remove();

            //Mostrar estrellas asignadas de cada usuario
            $('.rating-container').each(function(index) {
                var $container = $(this);
                var ratingValue = $container.attr('data-rating');
                activateStars($container,ratingValue);
            });

            function activateStars($container, ratingValue) {
                $container.find('.star').removeClass('active');
                $container.find('.star').each(function() {
                    if ($(this).attr('data-rating') <= ratingValue) {
                        $(this).addClass('active');
                    }
                });
            }
        </script>

    @endauth

@endsection

