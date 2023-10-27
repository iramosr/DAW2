<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">

    <form action="<?= BASE_URL ?>/usuarios/store" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="username" class="form-label">Usuario:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer apellido:</label>
            <input type="text" class="form-control" id="apellido1" name="apellido1">
        </div>
        <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo apellido:</label>
            <input type="text" class="form-control" id="apellido2" name="apellido2">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Imagen:</label>
            <input class="form-control" type="file" id="foto" name="foto">
        </div>
        <div class="mb-3">
            <label>Activo: </label>
                <input class="form-check-input" type="checkbox" name="activo[]" id="act" value=1>
        </div>
        <div class="mb-3">
            <label>Bloqueado:</label>
                <input class="form-check-input" type="checkbox" name="bloqueado[]" id="bloq" value=1>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>