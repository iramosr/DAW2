<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_admin.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_admin.php'; ?>

<div class="container py-1">
    <div class="d-flex bg-danger p-4 m-4">
        <h1 class="text-center">401</h1>
        <div class="p-2 flex-grow-1">
            <h1><i class="fa-solid fa-triangle-exclamation"></i>Usuario no identificado</h1>
        </div>

        <div class="p-2 bd-highlight">
            <img class="justify-content-end" src="<?=BASE_URL?>/assets/images/error_page.png"
            style="width: 100px">
        </div>
    </div>
</div>
<?php require_once 'views/layouts/footer_admin.php'; ?>
</body>
</html>