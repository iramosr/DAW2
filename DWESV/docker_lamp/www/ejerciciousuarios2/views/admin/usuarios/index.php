<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">
    <div class="py-1"></div>
    <div class="shadow-lg my-4 p-2 mt-2">
        <a href="<?= BASE_URL ?>/usuarios/add" class="btn btn-new float-end ms-auto shadow-sm fw-bold">
            +
        </a>
        <h3><?= $data['page-title'] ?></h3>
    </div>
    <?php require_once 'views/admin/usuarios/table_list.php'; ?>

</div>
    <?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>