<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?= BASE_URL ?>/login/in" method="post" class="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="#modalLoginLabel">ACCESO AL SISTEMA</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username-login" name="username"
                               placeholder="Usuario">
                        <label for="username">Nombre de usuario</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="password-login" name="password"
                               placeholder="Password">
                        <label for="password">Contraseña</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
                </div>
            </div>
        </form>
    </div>
</div>