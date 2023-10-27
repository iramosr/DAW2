<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>
<div class="container bg-white p-4">

    <form action="<?= BASE_URL ?>/usuarios/store" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="username" class="form-label">Nombre de usuario:</label>
            <input type="text" name="username" id="username" class="form-control" required maxlength="75">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" maxlength="60">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" required maxlength="75">
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" maxlength="20">
        </div>

        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido:</label>
            <input type="text" name="apellido1" id="apellido1" class="form-control"  maxlength="20">
        </div>

        <div class="mb-3">
            <label for="apellido2" class="form-label">Segundo Apellido:</label>
            <input type="text" name="apellido2" id="apellido2" class="form-control"  maxlength="20">
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Subir foto (JPEG, PNG, GIF):</label>
            <input type="file" name="foto" id="foto" class="form-control" accept="image/jpeg, image/png, image/gif">
        </div>

        <div class="mb-3">
            <label class="form-label">Estado:</label>
            <div class="form-check">
                <input type="radio" name="estado" id="activo" value="activo" class="form-check-input" checked>
                <label for="activo" class="form-check-label">Activo</label>
            </div>
            <div class="form-check">
                <input type="radio" name="estado" id="bloqueado" value="bloqueado" class="form-check-input">
                <label for="bloqueado" class="form-check-label">Bloqueado</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="intentos" class="form-label">intentos:</label>
            <input type="text" name="num_intentos" id="num_intentos" class="form-control"  maxlength="20">
        </div>

        <button type="submit" class="btn btn-primary">Borrar</button>
    </form>

</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>