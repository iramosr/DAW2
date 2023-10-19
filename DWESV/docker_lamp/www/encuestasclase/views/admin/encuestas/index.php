<!doctype html>
<html lang="es">

<?php require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>

<div class="container bg-white">

    <table>
        <thead>
            <th>Nombre</th>
        </thead>
        <tbody>
            <?php foreach ($data['encuestas'] as $encuesta) { ?>
                <tr>
                    <td><?=$encuesta['nombre']?></td>
                </tr>
            <?php } ?>
        <tbody>
    </table>


</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>