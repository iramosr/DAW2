<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">
    <div class="py-1"></div>
    <div class="shadow-lg my-4 p-2 mt-2">
        <!--
        <a href="<?php /*= BASE_URL */ ?>/usuarios/add" class="btn btn-new float-end ms-auto shadow-sm fw-bold">
            +
        </a>
-->
        <button class="btn btn-new float-end ms-auto shadow-sm fw-bold"
                data-bs-toggle="modal" data-bs-target="#modalForm">+
        </button>
        <h3><?= $data['page-title'] ?></h3>
    </div>
    <?php require 'views/admin/usuarios/table_list.php'; ?>

</div>

<?php require_once 'modal_form.php'; ?>
<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>