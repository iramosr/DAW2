<!doctype html>
<html lang="es">
<?php require_once 'views/layouts/head_main.php'; ?>
<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">

    <h2>Editar Usuario</h2>
    <form method="post" action="<?= BASE_URL ?>/usuarios/update/<?= $data['usuario']['id']?>">

        <input type="hidden" name="id" value="<?= isset($data['usuario']['id']) ? $data['usuario']['id'] : '' ?>">

        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= isset($data['usuario']['username']) ? $data['usuario']['username'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= isset($data['usuario']['password']) ? $data['usuario']['password'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= isset($data['usuario']['email']) ? $data['usuario']['email'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= isset($data['usuario']['nombre']) ? $data['usuario']['nombre'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="apellido1" class="form-label">Primer Apellido:</label>
            <input type="text" name="apellido1" id="apellido1" class="form-control" value="<?= isset($data['usuario']['apellido1']) ? $data['usuario']['apellido1'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for "apellido2" class="form-label">Segundo Apellido:</label>
            <input type="text" name="apellido2" id="apellido2" class="form-control" value="<?= isset($data['usuario']['apellido2']) ? $data['usuario']['apellido2'] : '' ?>">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Imagen:</label>
            <input class="form-control" type="file" id="foto" name="foto"
                   value="<?= isset($data['usuario']['foto']) ? $data['usuario']['foto'] : '' ?>">
        </div>
        <div class="mb-3">
            <label>Activo:</label>
            <input class="form-check-input" type="checkbox" name="activo[]" id="act"
                   value="<?= (isset($data['usuario']['activo']) == 1) ? 'selected' : '' ?>">
        </div>
        <div class="mb-3">
            <label>Bloqueado:</label>
            <input class="form-check-input" type="checkbox" name="bloqueado[]" id="bloq"
                   value="<?= (isset($data['usuario']['bloqueado']) == 1) ? 'selected' : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary" >Actualizar</button>
    </form>
</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>
