<form action="<?= $data['accion'] ?? '' ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="codigo" class="form-label">Código:</label>
        <input type="text" class="form-control" id="codigo" name="codigo"
               value="<?= isset($data['viaje']['codigo']) ? $data['viaje']['codigo'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" class="form-control" id="titulo" name="titulo"
               value="<?= isset($data['viaje']['titulo']) ? $data['viaje']['titulo'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" <?= $data['readonly'] ?? '' ?>><?= isset($data['viaje']['descripcion']) ? $data['viaje']['descripcion'] : '' ?></textarea>
    </div>
    <div class="mb-3">
        <label for="salida" class="form-label">Salida:</label>
        <input type="datetime-local" class="form-control" id="salida" name="salida"
               value="<?= isset($data['viaje']['salida']) ? $data['viaje']['salida'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="llegada" class="form-label">Llegada:</label>
        <input type="datetime-local" class="form-control" id="llegada" name="llegada"
               value="<?= isset($data['viaje']['llegada']) ? $data['viaje']['llegada'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="plazas" class="form-label">Plazas:</label>
        <input type="number" step="1" class="form-control" id="plazas" name="plazas"
               value="<?= isset($data['viaje']['plazas']) ? $data['viaje']['plazas'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio:</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio"
               value="<?= isset($data['viaje']['precio']) ? $data['viaje']['precio'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Imagen:</label>
        <input class="form-control" type="file" id="foto" name="foto"
               value="<?= isset($data['viaje']['foto']) ? $data['viaje']['foto'] : '' ?>"
            <?= $data['disabled'] ?? '' ?>>
    </div>
    <div class="mb-3">
        <label for="empleado_id" class="form-label">Empleado:</label>
        <select class="form-select" id="empleado_id" name="empleado_id" <?= $data['disabled'] ?? '' ?>>
            <option value="0" <?php if (!isset($data['viaje']['empleado_id'])) {
                echo 'selected';
            } ?>>
                Seleccione un empleado
            </option>
            <?php foreach ($data['empleados'] as $empleado) { ?>
                <option value="<?= $empleado['usuario_id'] ?>"
                    <?php if (isset($data['viaje']['empleado_id']) && $data['viaje']['empleado_id'] == $empleado['usuario_id']) {
                        echo 'selected';
                    } ?>>

                    <?= $empleado['nombre'] . " " . $empleado['apellido1'] ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <?php if (isset($data['title-btn-submit'])) { ?>
        <input type="submit" class="btn-save" value="<?= $data['title-btn-submit'] ?>">
    <?php } ?>

</form>