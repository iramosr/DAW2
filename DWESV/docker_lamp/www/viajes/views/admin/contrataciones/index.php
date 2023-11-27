<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_admin.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_admin.php'; ?>

<div class="container bg-white">
    <div class="py-1"></div>
    <div class="shadow-lg my-4 p-2 mt-2">
        <h3><?= $data['page-title'] ?></h3>
    </div>
    <?php require 'views/admin/contrataciones/table_list.php'; ?>

</div>

<?php require_once 'modal_form.php'; ?>
<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>