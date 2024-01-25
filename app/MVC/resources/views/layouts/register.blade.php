@extends('index')

@section('content')
    <form>
        @csrf

        <div class="form-group mb-1">
            <label for="emailInput">Correo electrónico</label>
            <input required type="email" class="form-control" name="email">
        </div>
        <div class="form-group mb-1">
            <label for="nameInput">Nombre</label>
            <input required type="text" class="form-control" name="nom">
        </div>
        <div class="form-group mb-1">
            <label for="surnameInput">Apellido</label>
            <input required type="text" class="form-control" name="cognom">
        </div>
        <div class="form-group mb-1">
            <label for="secondSurnameInput">Segundo Apellido</label>
            <input type="text" class="form-control" name="cognom2">
        </div>
        <div class="form-group mb-1">
            <label for="passwordInput">Contraseña</label>
            <input required type="password" class="form-control" name="contrasenya">
        </div>
        <div class="form-group mb-1">
            <label for="addressInput">Dirección</label>
            <input required type="text" class="form-control" name="direccio">
        </div>
        <div class="form-group mb-1">
            <label for="phoneInput">Teléfono</label>
            <input required type="number" class="form-control" name="telefon">
        </div>
        <div class="form-group mb-1">
            <label for="cityInput">Ciudad</label>
            <input required type="text" class="form-control" name="ciutat">
        </div>
        <div class="form-group mb-2">
            <label for="provinceSelect">Provincia</label>
            <select required name="province" class="form-control">
                <option value="">Elige Provincia</option>
                <option value="Álava/Araba">Álava/Araba</option>
                <option value="Albacete">Albacete</option>
                <option value="Alicante">Alicante</option>
                <option value="Almería">Almería</option>
                <option value="Asturias">Asturias</option>
                <option value="Ávila">Ávila</option>
                <option value="Badajoz">Badajoz</option>
                <option value="Baleares">Baleares</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Burgos">Burgos</option>
                <option value="Cáceres">Cáceres</option>
                <option value="Cádiz">Cádiz</option>
                <option value="Cantabria">Cantabria</option>
                <option value="Castellón">Castellón</option>
                <option value="Ceuta">Ceuta</option>
                <option value="Ciudad Real">Ciudad Real</option>
                <option value="Córdoba">Córdoba</option>
                <option value="Cuenca">Cuenca</option>
                <option value="Gerona/Girona">Gerona/Girona</option>
                <option value="Granada">Granada</option>
                <option value="Guadalajara">Guadalajara</option>
                <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                <option value="Huelva">Huelva</option>
                <option value="Huesca">Huesca</option>
                <option value="Jaén">Jaén</option>
                <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                <option value="La Rioja">La Rioja</option>
                <option value="Las Palmas">Las Palmas</option>
                <option value="León">León</option>
                <option value="Lérida/Lleida">Lérida/Lleida</option>
                <option value="Lugo">Lugo</option>
                <option value="Madrid">Madrid</option>
                <option value="Málaga">Málaga</option>
                <option value="Melilla">Melilla</option>
                <option value="Murcia">Murcia</option>
                <option value="Navarra">Navarra</option>
                <option value="Orense/Ourense">Orense/Ourense</option>
                <option value="Palencia">Palencia</option>
                <option value="Pontevedra">Pontevedra</option>
                <option value="Salamanca">Salamanca</option>
                <option value="Segovia">Segovia</option>
                <option value="Sevilla">Sevilla</option>
                <option value="Soria">Soria</option>
                <option value="Tarragona">Tarragona</option>
                <option value="Tenerife">Tenerife</option>
                <option value="Teruel">Teruel</option>
                <option value="Toledo">Toledo</option>
                <option value="Valencia">Valencia</option>
                <option value="Valladolid">Valladolid</option>
                <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                <option value="Zamora">Zamora</option>
                <option value="Zaragoza">Zaragoza</option>
            </select>
        </div>

        <div class="form-check">
            <input required class="form-check-input" type="checkbox" value="" name="">
            <label class="form-check-label" for="privacyPolicyCheckbox">
                Acepto la política de privacidad y seguridad
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection
