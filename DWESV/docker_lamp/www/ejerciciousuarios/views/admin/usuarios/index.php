<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">

    <a href="<?= BASE_URL ?>/usuarios/add" class="btn btn-dark">NUEVO</a>

    <table class="table table-striped">
        <thead>
        <th class="align-middle text-center">Username</th>
        <th class="align-middle text-center">Email</th>
        <th class="align-middle text-center">Nombre</th>
        <th class="align-middle text-center">Primer Apellido</th>
        <th class="align-middle text-center">Foto</th>
        <th class="align-middle text-center">Activo</th>
        <th class="align-middle text-center">Bloqueado</th>
        <th class="align-middle text-center">Último acceso</th>
        <th class="align-middle text-center">Opciones</th>
        </thead>
        <tbody>
        <?php foreach ($data['usuarios'] as $usuario) { ?>
            <tr>
                <td class="align-middle"><?= $usuario['username'] ?></td>
                <td class="align-middle"><?= $usuario['email'] ?></td>
                <td class="align-middle"><?= $usuario['nombre'] ?></td>
                <td class="align-middle"><?= $usuario['apellido1'] ?></td>

                <td class="align-middle text-center">
                    <?php if ($usuario['foto'] !== null && $usuario['foto'] != '') { ?>
                        <img src="<?= BASE_URL . '/uploads/fotos/usuarios/' . $usuario['foto'] ?>"
                             style="height: 50px">
                    <?php } ?>
                </td>
                <td class="align-middle text-center">
                    <?php if ($usuario['activo']) { ?>
                        <span class="badge bg-success">Sí</span>
                    <?php } else { ?>
                        <span class="badge bg-danger">No</span>
                    <?php } ?>
                </td>
                <td class="align-middle text-center">
                    <?php if ($usuario['bloqueado']) { ?>
                        <span class="badge bg-success">Sí</span>
                    <?php } else { ?>
                        <span class="badge bg-danger">No</span>
                    <?php } ?>
                </td>
                <td class="align-middle text-center"><?= date("d-m-Y",strtotime($usuario['ultimo_acceso']))?></td>
                <td class="align-middle text-center">
                    <a href="<?= BASE_URL ?>/usuarios/show/<?= $usuario['id'] ?>"
                       class="rounded bg-info text-white m-2 p-2 link-underline link-underline-opacity-0 text-center">
                        <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                    </a>
                    <a href="<?= BASE_URL ?>/usuarios/update/<?= $usuario['id'] ?>"
                       class="rounded bg-warning text-white m-2 p-2 link-underline link-underline-opacity-0 text-center">
                        <i class="fa-solid fa-user-pen fa-sm" style="color: #ffffff;"></i>
                    </a>
                    <a href="<?= BASE_URL ?>/usuarios/delete/<?=$usuario['id']?> "
                       class="rounded bg-danger text-white m-2 p-2 link-underline link-underline-opacity-0 text-center"
                       data-toggle="modal" data-target="#Modal">
                        <i class="fa-solid fa-trash-can fa-sm" style="color: #ffffff;"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        <tbody>
    </table>
<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>