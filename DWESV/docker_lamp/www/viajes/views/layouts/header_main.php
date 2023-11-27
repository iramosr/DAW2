<nav class="navbar navbar-expand-lg bg-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>">
            <img src="<?= BASE_URL ?>/assets/images/logo.png" style="width: 50px;" alt="logo"/>
            Viajes
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>/viajes">Viajes</a>
                </li>
                <?php if (isset($_SESSION['usuario']) && in_array('CLIENTE', $_SESSION['usuario']['roles'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>/contrataciones">Mis viajes</a>
                    </li>
                <?php } ?>
                <?php if (isset($_SESSION['usuario']) && in_array('EMPLE', $_SESSION['usuario']['roles'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>/admin">Administración</a>
                    </li>
                <?php } ?>
            </ul>
            <?php if (!isset($_SESSION['usuario'])) { ?>
                <button class="btn btn-outline-succes"
                        data-bs-toggle="modal" data-bs-target="#modalLogin">Entrar
                </button>
                <button class="btn btn-outline-succes"
                        data-bs-toggle="modal" data-bs-target="#modalRegistro">Registrarse
                </button>
            <?php } else { ?>
                <div class="fw-bold me-1">
                    <?php if (isset($_SESSION['usuario']['foto'])) { ?>
                        <img src="<?= BASE_URL . '/uploads/fotos/usuarios/' . $_SESSION['usuario']['foto'] ?>"
                             style="height: 50px">
                    <?php } ?>
                </div>
                <div class="fw-bold me-1">
                    <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido1'] . ' ' . $_SESSION['usuario']['apellido2'] ?>
                </div>
                <form class="d-flex" role="search" action="<?= BASE_URL ?>/login/out">
                    <button class="btn btn-outline-success" type="submit">SALIR</button>
                </form>
            <?php } ?>
        </div>
    </div>
</nav>
<!-- CARGO MODAL LOGIN -->
<?php require_once 'views/layouts/modal_login.php'; ?>
<!-- CARGO MODAL REGISTRO -->
<?php require_once 'views/layouts/modal_registro.php'; ?>


<div id="msg">

    <!-- Muestra el mensaje -->
    <?php
    if (isset($_SESSION['result']))
        $data['result'] = $_SESSION['result'];

    if (isset($data['result'])) {
        $icon = match ($data['result']['type']) {
            'info' => "<i class='fa-solid fa-circle-info fa-lg'></i>",
            'success' => "<i class='fa-solid fa-thumbs-up'></i>",
            'warning' => "<i class='fa-solid fa-triangle-exclamation fa-lg'></i>",
            'error' => "<i class='fa-solid fa-circle-exclamation fa-lg'></i>",
            default => "<i class='fa-solid fa-thumbs-up'></i>"
        };
        $color = match ($data['result']['type']) {
            'info' => "#000000",
            'success' => "#000000",
            'warning' => "#000000",
            'error' => "#ffffff",
            default => "#000000"
        };
        $background = match ($data['result']['type']) {
            'info' => "#60c7d3",
            'success' => "#a4e873",
            'warning' => "#f5da2c",
            'error' => "#bb1313",
            default => "#ffffff"
        };

        ?>
        <script>
            window.addEventListener('DOMContentLoaded', (event) => {
                Swal.fire({
                    html: "<?=$icon . '<br>' . $data['result']['msg']?>",
                    toast: true,
                    timer: 4000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    position: 'bottom-end',
                    width: 300,
                    color: "<?=$color?>",
                    background: "<?=$background?>",
                    showClass: {
                        popup: 'animate__animated animate__fadeInUp'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutDown'
                    }
                });
            });
        </script>
        <?php
        #Para que no muestre el mensaje al recargar
        unset($data['result']);
        unset($_SESSION['result']);

    } ?>
</div>


