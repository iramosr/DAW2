<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">

    <a href="<?=BASE_URL?>/usuarios/add" class="btn btn-dark">NUEVO</a>

    <table class="table table-striped">
        <thead>
            <th>Username</th>
            <th>Email</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Foto</th>
            <th>Activo</th>
            <th>Último acceso</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            <?php foreach ($data['usuarios'] as $usuario) { ?>
                <tr>
                    <td><?=$usuario['username']?></td>
                    <td><?=$usuario['email']?></td>
                    <td><?=$usuario['nombre']?></td>
                    <td><?=$usuario['apellido1']?></td>
                    <td>
                        <?php if ($usuario['foto'] !== null && $usuario['foto'] != '') { ?>
                            <img src="<?= BASE_URL.'/uploads/fotos/'.$usuario['foto']?>"
                                 style="width: 100px">
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($usuario['activo']) {?>
                            <span class="badge bg-success">Sí</span>
                        <?php } else { ?>
                            <span class="badge bg-danger">No</span>
                        <?php } ?>
                    </td>
                    <td><?=$usuario['ultimo_acceso']?></td>
                    <td>
                        <a href="c<?=BASE_URL?>/usuarios/delete?id=<?=$usuario['id']?>"
                           class="rounded bg-danger text-white px-1 me-1 small link-underline link-underline-opacity-0">
                            BORRAR
                        </a>
                        <a href="<?=BASE_URL?>/usuarios/show?id=<?=$usuario['id']?>"
                           class="rounded bg-info text-white px-1 small me-1 link-underline link-underline-opacity-0">
                            VER
                        </a>
                        <a href="<?=BASE_URL?>/usuarios/update?id=<?=$usuario['id']?>"
                           class="rounded bg-warning text-white px-1 small link-underline link-underline-opacity-0">
                            ACTUALIZAR
                        </a>
                    </td>
                </tr>
            <?php } ?>
        <tbody>
    </table>


</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>