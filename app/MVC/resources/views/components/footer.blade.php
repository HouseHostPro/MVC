<footer class="footer-color text-light">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h3>Información de Contacto</h3>
                <p>Dirección: C/Doctor Fleming nº14</p>
                <p>Teléfono: +34 971 52 34 67</p>
                <p>Correo Electrónico: info@househostpro.com</p>
            </div>
            <div class="col-md-4">
                <h3>Enlaces Rápidos</h3>
                <ul class="list-unstyled">
                    <li><a href="{{ route('principal', ['id' => $PROPIETAT_ID]) }}" class="text-light">Inicio</a></li>
                    <li><a href="#" class="text-light">Reservas</a></li>
                    <li><a href="#" class="text-light">Comentarios</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Suscríbete a Nuestro Boletín</h3>
                <p>Recibe ofertas especiales y actualizaciones directamente en tu bandeja de entrada.</p>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Tu Correo Electrónico" aria-label="Tu Correo Electrónico" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Suscribirse</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid footer2-color text-center py-2">
        <p class="mb-0">Derechos de autor &copy; 2024 Reservas Nacionales. Todos los derechos reservados.</p>
    </div>
</footer>
