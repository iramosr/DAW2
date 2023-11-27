<!doctype html>
<html lang="es">

<?php use dao\RolesDao;
use dao\ViajesDao;

require_once 'views/layouts/head_main.php'; ?>

<body class="bg-light">
<?php require_once 'views/layouts/header_main.php'; ?>


<div class="container bg-white">
    <h2 class="text-center">VIAJES DESTACADOS</h2>

    <div class="row">
        <?php
        //Obtiene todos los viajes con foto
        $viajesDao = new ViajesDao();
        $viajes = $viajesDao->listAll();
        $viajes = array_filter($viajes, function ($viaje) {
            return $viaje['foto'] !== null && $viaje['foto'] != '';
        });
        //Si hay mas de 6, elige 6 aleatorios
        if (count($viajes) > 6) {
            shuffle($viajes);
            $viajes = array_slice($viajes, 0, 6);
        }

        foreach ($viajes as $viaje) { ?>
            <!-- Muestra los viajes (foto, titulo, salida y descripción) -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if ($viaje['foto'] !== null && $viaje['foto'] != '') { ?>
                        <img src="<?= BASE_URL . '/uploads/fotos/viajes/' . $viaje['foto'] ?>"
                             style="max-height: 200px">
                    <?php } ?>
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <!-- datos del viaje -->
                        <div>
                            <h5 class="card-title"><?= $viaje['titulo']; ?></h5>
                            <?php if (isset($_SESSION['usuario'])) {
                                $rolesDao = new RolesDao();
                                $roles = $rolesDao->roles($_SESSION['usuario']['id']);
                                if (in_array('CLIENTE', $roles)) {
                                ?>
                                <div>
                                    <form action="<?= BASE_URL ?>/contrataciones/store/" method="post">
                                        <input name="viaje_id" type="hidden" value="<?= $viaje['id'] ?>">
                                        <input name="cliente_id" type="hidden"
                                               value="<?= $_SESSION['usuario']['id'] ?>">
                                        <button class="btn btn-outline-success" type="submit">Contratar</button>
                                    </form>
                                </div>
                            <?php }} ?>
                            <p>Salida: <?= $viaje['salida']; ?></p>
                            <p class="card-text"
                               style="height: 100px; overflow-y: auto;"><?= $viaje['descripcion']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php require_once 'views/layouts/footer_main.php'; ?>
</body>
</html>