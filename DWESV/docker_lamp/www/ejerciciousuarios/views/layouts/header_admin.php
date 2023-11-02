<nav class="navbar navbar-expand-lg bg-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>">
            <img src="<?= BASE_URL ?>/assets/images/logo.png" style="width: 50px;" alt="logo" />
            Usuarios
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
                    <a class="nav-link" href="<?= BASE_URL ?>/usuarios">Usuarios</a>
                </li>
            </ul>
            <a class="nav-link" href="<?= BASE_URL ?>/login">
                <button class="btn btn-outline-success" type="submit">Login</button>
            </a>
        </div>
    </div>
</nav>


<div id="msg">

    <!--
                <?php /*if (isset($data['result']) && $data['result']['type'] === "error") {*/ ?>
                    <div class="bg-danger mb-2 px4 py-1">
                        <?php /*=$data['result']['msg'] ?? ''*/ ?>
                        </div>
                <?php /*} */ ?>

                <?php /*if (isset($data['result']) && $data['result']['type'] === "success") {*/ ?>
                    <div class="bg-success mb-2 px4 py-1">
                        <?php /*=$data['result']['msg'] ?? ''*/ ?>
                    </div>
                <?php /*} */ ?>
-->

    <!-- Muestra si se ha añadido el usuario -->
    <?php if (isset($data['result'])) {
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
                    html: "<?=$icon.'<br>'.$data['result']['msg']?>",
                    toast: true,
                    timer: 4000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    position: 'top-end',
                    width: 300,
                    color: "<?=$color?>",
                    background: "<?=$background?>",
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass:{
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            });
        </script>
    <?php } ?>
</div>


