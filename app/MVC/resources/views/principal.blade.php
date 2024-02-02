@extends('layouts.plantilla')

@section('content')

    <div class="row d-flex justify-content-between">
        <div class="col-7 justify-content-end">
            <h1 class="text-end mt-3">Cas Concos</h1>
        </div>
        <div class="d-flex justify-content-start mt-4 col-2 ">
            <a href="{{ route('fichaCasa') }}" class="text-decoration-none text-black">
            <button type="button" class="btn bg-info bg-opacity-25">Ficha Casa</button>
            </a>
        </div>
    </div>
    <main class="container">
        <section class="mt-4 d-flex text-center ms-5">
            <a href="{{ route('fichaCasa') }}">
                <img class="img-fluid bsb-scale-up bsb-hover-scale rounded shadow" src="img/frontCasa.webp" alt="entrada" style="width: 70%">
            </a>
        </section>
        <div class="col-12 mt-5">
            <h2 class="fs-4">Descipció</h2>
            <div>
                <p>
                    Bienvenido a esta casa de alquiler en el campo, donde la modernidad se fusiona con la serenidad.
                    Ubicada en un entorno natural, la propiedad ofrece una experiencia única de escape.
                    Con un diseño contemporáneo y luminoso, la casa cuenta con amplios ventanales que permiten la entrada de luz natural,
                    creando un ambiente acogedor. La cocina completamente equipada invita a preparar deliciosas comidas mientras se disfruta de las vistas al jardín y la piscina.
                    Las habitaciones, elegantemente decoradas, ofrecen un refugio tranquilo para descansar. En el exterior,
                    una impresionante piscina y amplias áreas de descanso al aire libre permiten disfrutar de la naturaleza.
                    Con numerosas oportunidades para la exploración y la aventura en los alrededores, esta casa es el lugar perfecto para una escapada inolvidable en medio del campo.
                </p>
            </div>
        </div>
    </main>
@endsection

