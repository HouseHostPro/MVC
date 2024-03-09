<footer class="footer-color text-light">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h3>{{__('Información de Contacto')}}</h3>
                <p>{{__('Dirección')}}: C/Doctor Fleming nº14</p>
                <p>{{__('Teléfono')}}: +34 971 52 34 67</p>
                <p>{{__('Correo Electrónico: info@househostpro.com')}}</p>
            </div>
            <div class="col-md-4">
                <h3>{{__('Enlaces Rápidos')}}</h3>
                <ul class="list-unstyled">
                    <li><a href="{{ route('principal', ['id' => $PROPIETAT_ID]) }}" class="text-light">{{__('Inicio')}}</a></li>
                    <li><a href="#" class="text-light">{{__('Reservas')}}</a></li>
                    <li><a href="#" class="text-light">{{__('Comentarios')}}</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>{{__('Suscríbete a Nuestro Boletín')}}</h3>
                <p>{{__('Recibe ofertas especiales y actualizaciones directamente en tu bandeja de entrada')}}.</p>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="{{__('Tu Correo Electrónico')}}" aria-label="{{__('Tu Correo Electrónico')}}" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">{{__('Suscribirse')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid footer2-color text-center py-2">
        <p class="mb-0">{{__('Derechos de autor @ 2024 Reservas Nacionales. Todos los derechos reservados')}}</p>
    </div>
</footer>
