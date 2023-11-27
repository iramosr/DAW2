<!-- Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" aria-labelledby="modalRegistroLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?= BASE_URL ?>/login/registro" method="post" class="form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="#modalLoginLabel">REGISTRO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario:<sup>*</sup></label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:<sup>*</sup></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:<sup>*</sup></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:<sup>*</sup></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido1" class="form-label">Primer apellido:<sup>*</sup></label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido2" class="form-label">Segundo apellido:</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Imagen:</label>
                        <input class="form-control" type="file" id="foto" name="foto">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
                </div>
            </div>
        </form>
    </div>
</div>