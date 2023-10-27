<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="form-signin container text-center">
    <form action="<?= BASE_URL ?>/home/login_verify" method="post" class="form">
        <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
            <label for="username">Nombre de usuario</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <label for="password">Contraseña</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
    </form>
</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>