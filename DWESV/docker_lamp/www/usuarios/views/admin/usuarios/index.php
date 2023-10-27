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
        <th>Password</th>
        <th>Email</th>
        <th>Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Estado</th>
        <th>Foto</th>
        <th>Acciones</th> <!-- Nueva columna para acciones -->
        </thead>
        <tbody>
        <?php foreach ($data['usuarios'] as $usuario) { ?>
            <tr>
                <td><?=$usuario['username']?></td>
                <td><?=$usuario['password']?></td>
                <td><?=$usuario['email']?></td>
                <td><?=$usuario['nombre']?></td>
                <td><?=$usuario['apellido1']?></td>
                <td><?=$usuario['apellido2']?></td>
                <td>
                    <?php if ($usuario['bloqueado'] == 0) { ?>
                        Activo
                    <?php } else { ?>
                        Bloqueado
                    <?php } ?>
                </td>
                <td>
                    <?php if ($usuario['foto'] !== null && $usuario['foto'] != '') { ?>
                        <img src="<?= BASE_URL.'/uploads/fotos/'.$usuario['foto']?>" style="width: 100px">
                    <?php } ?>
                </td>
                <td>
                    <a href="<?= BASE_URL ?>/usuarios/show/<?=$usuario['id']?>" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path>
                        </svg></a>
                    <a href="<?= BASE_URL ?>/usuarios/update/<?=$usuario['id']?>" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                            <path d="M16 5l3 3"></path>
                        </svg></a>
                    <a href="<?= BASE_URL ?>/usuarios/delete/<?=$usuario['id']?>" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7l16 0"></path>
                            <path d="M10 11l0 6"></path>
                            <path d="M14 11l0 6"></path>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once 'views/layouts/footer_main.php'; ?>

</body>
</html>
