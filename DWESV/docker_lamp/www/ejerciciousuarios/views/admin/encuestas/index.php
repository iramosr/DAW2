<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">

    <a href="<?=BASE_URL?>/encuestas/add" class="btn btn-dark">NUEVA</a>

    <table class="table table-striped">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Fecha Nacimiento</th>
            <th>Foto</th>
        </thead>
        <tbody>
            <?php foreach ($data['encuestas'] as $encuesta) { ?>
                <tr>
                    <td><?=$encuesta['nombre']?></td>
                    <td><?=$encuesta['apellidos']?></td>
                    <td><?=$encuesta['email']?></td>
                    <td><?=date('d/m/Y',$encuesta['fecha_nacimiento'])?></td>
                    <td>
                        <?php if ($encuesta['foto'] !== null && $encuesta['foto'] != '') { ?>
                            <img src="<?= BASE_URL.'/uploads/fotos/'.$encuesta['foto']?>"
                                 style="width: 100px">
                    <!-- <img src="<?php // UPLOAD_FOTOS . '/' . $encuesta['foto'] ?>" style="width: 100px"> -->
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <tbody>
    </table>


</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>