<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form action="<?= $data['accion'] ?? '' ?>" method="post" enctype="multipart/form-data" class="w-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="#modalFormLabel">NUEVO USUARIO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuario:<sup>*</sup></label>
                        <input type="text" class="form-control" id="username" name="username"
                               value="<?= isset($data['usuario']['username']) ? $data['usuario']['username'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:<sup>*</sup></label>
                        <input type="password" class="form-control" id="password" name="password"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:<sup>*</sup></label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= isset($data['usuario']['email']) ? $data['usuario']['email'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:<sup>*</sup></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               value="<?= isset($data['usuario']['nombre']) ? $data['usuario']['nombre'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido1" class="form-label">Primer apellido:<sup>*</sup></label>
                        <input type="text" class="form-control" id="apellido1" name="apellido1"
                               value="<?= isset($data['usuario']['apellido1']) ? $data['usuario']['apellido1'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido2" class="form-label">Segundo apellido:</label>
                        <input type="text" class="form-control" id="apellido2" name="apellido2"
                               value="<?= isset($data['usuario']['apellido2']) ? $data['usuario']['apellido2'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?>>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Imagen:</label>
                        <input class="form-control" type="file" id="foto" name="foto"
                               value="<?= isset($data['usuario']['foto']) ? $data['usuario']['foto'] : '' ?>"
                            <?= $data['disabled'] ?? '' ?>>
                    </div>

                    <div class="mb-3">
                        <label>Activo:</label>
                        <input class="form-check-input" type="checkbox" name="activo[]" id="act"
                               value="<?= isset($data['usuario']['activo']) ? $data['usuario']['activo'] : '' ?>"
                            <?= isset($data['usuario']) && $data['usuario']['activo'] ? 'checked' : '' ?>
                            <?= $data['disabled'] ?? '' ?>
                        >
                    </div>
                    <div class="mb-3">
                        <label>Bloqueado:</label>
                        <input class="form-check-input" type="checkbox" name="bloqueado[]" id="bloq"
                               value="<?= isset($data['usuario']['bloqueado']) ? $data['usuario']['bloqueado'] : '' ?>"
                            <?= isset($data['usuario']['bloqueado']) && ($data['usuario']['bloqueado'] == 1) ? 'checked' : '' ?>
                            <?= $data['disabled'] ?? '' ?>>
                    </div>
                    <div class="mb-3">
                        <label>Administrador:</label>
                        <input class="form-check-input" type="checkbox" name="rolAdmin" id="rolAdmin"
                               value="<?= isset($data['usuario']['rolAdmin']) ? $data['usuario']['rolAdmin'] : '' ?>"
                            <?= isset($data['usuario']['rolAdmin']) && ($data['usuario']['rolAdmin'] == 1) ? 'checked' : '' ?>
                            <?= $data['disabled'] ?? '' ?>>
                    </div>
                    <div class="mb-3">
                        <label>Empleado:</label>
                        <input class="form-check-input" type="checkbox" name="rolEmpleado" id="rolEmpleado"
                               value="<?= isset($data['usuario']['rolEmpleado']) ? $data['usuario']['rolEmpleado'] : '' ?>"
                            <?= isset($data['usuario']['rolEmpleado']) && ($data['usuario']['rolEmpleado'] == 1) ? 'checked' : '' ?>
                            <?= $data['disabled'] ?? '' ?>>
                    </div>
                    <div class="mb-3">
                        <label>Cliente:</label>
                        <input class="form-check-input" type="checkbox" name="rolCliente" id="rolCliente"
                               value="<?= isset($data['usuario']['rolCliente']) ? $data['usuario']['rolCliente'] : '' ?>"
                            <?= isset($data['usuario']['rolCliente']) && ($data['usuario']['rolCliente'] == 1) ? 'checked' : '' ?>
                            <?= $data['disabled'] ?? '' ?>>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php if (isset($data['title-btn-submit'])) { ?>
                        <input type="submit" class="btn btn-save" value="<?= $data['title-btn-submit'] ?>">
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>