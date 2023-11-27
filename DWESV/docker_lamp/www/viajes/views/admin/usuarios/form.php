<form action="<?= $data['accion'] ?? '' ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Usuario:</label>
        <input type="text" class="form-control" id="username" name="username"
               value="<?= isset($data['usuario']['username']) ? $data['usuario']['username'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña:</label>
        <input type="password" class="form-control" id="password" name="password"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email"
               value="<?= isset($data['usuario']['email']) ? $data['usuario']['email'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre"
               value="<?= isset($data['usuario']['nombre']) ? $data['usuario']['nombre'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="apellido1" class="form-label">Primer apellido:</label>
        <input type="text" class="form-control" id="apellido1" name="apellido1"
               value="<?= isset($data['usuario']['apellido1']) ? $data['usuario']['apellido1'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
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
               value="<?= in_array('ADMIN', $data['usuario']['roles']) ? 'ADMIN' : '' ?>"
            <?= isset($data['usuario']['roles']) && (in_array('ADMIN', $data['usuario']['roles'])) ? 'checked' : '' ?>
            <?= $data['disabled'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label>Empleado:</label>
        <input class="form-check-input" type="checkbox" name="rolEmpleado" id="rolEmpleado"
               value="<?= in_array('EMPLE', $data['usuario']['roles']) ? 'EMPLE' : '' ?>"
            <?= isset($data['usuario']['roles']) && (in_array('EMPLE', $data['usuario']['roles'])) ? 'checked' : '' ?>
            <?= $data['disabled'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label>Cliente:</label>
        <input class="form-check-input" type="checkbox" name="rolCliente" id="rolCliente"
               value="<?= in_array('CLIENTE', $data['usuario']['roles']) ? 'CLIENTE' : '' ?>"
            <?= isset($data['usuario']['roles']) && (in_array('CLIENTE', $data['usuario']['roles'])) ? 'checked' : '' ?>
            <?= $data['disabled'] ?? '' ?>>
    </div>
    <?php if (isset($data['title-btn-submit'])) { ?>
        <input type="submit" class="btn-save" value="<?= $data['title-btn-submit'] ?>">
    <?php } ?>

</form>