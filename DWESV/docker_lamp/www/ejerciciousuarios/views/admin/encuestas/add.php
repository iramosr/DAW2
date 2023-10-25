<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">

    <form action="<?= BASE_URL ?>/encuestas/store" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">Fecha nacimiento:</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
        </div>
        <div class="mb-3">
            <label class="form-label">Sexo:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexoH" value="H">
                <label class="form-check-label" for="sexoH">
                    Hombre
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexoM" value="M">
                <label class="form-check-label" for="sexoM">
                    Mujer
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexoO" value="O">
                <label class="form-check-label" for="sexoO">
                    Otro
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexoX" value="X">
                <label class="form-check-label" for="sexoX">
                    Prefiero no decirlo
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label>Aficiones:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aficiones[]" id="inf" value="INF">
                <label class="form-check-label" for="inf">
                    Informática
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aficiones[]" id="lec" value="LEC">
                <label class="form-check-label" for="lec">
                    Lectura
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="aficiones[]" id="dep" value="DEP">
                <label class="form-check-label" for="dep">
                    Deporte
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="estudios" class="form-label">Nivel de estudios:</label>
            <select class="form-select" id="estudios" name="estudios">
                <option value="">Sin especificar</option>
                <option value="sec">Secundaria</option>
                <option value="bach">Bachillerato</option>
                <option value="tgm">Técnico Grado Medio</option>
                <option value="tgs">Técnico Grado Superior</option>
                <option value="grad">Graduado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones:</label>
            <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Imagen:</label>
            <input class="form-control" type="file" id="foto" name="foto">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>