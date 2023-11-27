<!doctype html>
<html lang="es">

<?php use dao\ViajesDao;

require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>


<div class="container bg-white">
    <h2 class="text-center">Galería de viajes</h2>

    <div class="row">
        <?php
        $viajesDao = new ViajesDao();
        $viajes = $viajesDao->listAll();
        $viajes = array_filter($viajes, function ($viaje) {
            return $viaje['foto'] !== null && $viaje['foto'] != '';
        });
        //obtiene 6 viajes con foto al azar
        if (count($viajes) > 6) {
            shuffle($viajes);
            $viajes = array_slice($viajes, 0, 6);
        }

        foreach ($viajes as $viaje) { ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if ($viaje['foto'] !== null && $viaje['foto'] != '') { ?>
                        <img src="<?= BASE_URL . '/uploads/fotos/viajes/' . $viaje['foto'] ?>"
                             style="max-height: 200px">
                    <?php } ?>
                    <div class="card-body">
                        <!-- datos del viaje -->
                        <h5 class="card-title"><?= $viaje['titulo']; ?></h5>
                        <p>Fecha: <?= $viaje['salida']; ?></p>
                        <p class="card-text" style="height: 100px; overflow-y: auto;"><?= $viaje['descripcion']; ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>