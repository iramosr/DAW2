<form action="<?= $data['accion'] ?? '' ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="viaje_id" class="form-label">Viaje:</label>
        <select class="form-select" id="viaje_id" name="viaje_id" <?= $data['disabled'] ?? '' ?>>
            <option value="0" <?php if (!isset($data['contratacion']['viaje_id'])) {
                echo 'selected';
            } ?>>
                Seleccione un viaje
            </option>
            <?php foreach ($data['viajes'] as $viaje) { ?>
                <option value="<?= $viaje['id'] ?>"
                    <?php if (isset($data['contratacion']['viaje_id']) && $data['contratacion']['viaje_id'] == $viaje['id']) {
                        echo 'selected';
                    } ?>>

                    <?= $viaje['codigo'] . " - " . $viaje['titulo'] ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente:</label>
        <select class="form-select" id="cliente_id" name="cliente_id" <?= $data['disabled'] ?? '' ?>>
            <option value="0" <?php if (!isset($data['contratacion']['cliente_id'])) {
                echo 'selected';
            } ?>>
                Seleccione un cliente
            </option>
            <?php foreach ($data['clientes'] as $cliente) { ?>
                <option value="<?= $cliente['usuario_id'] ?>"
                    <?php if (isset($data['contratacion']['cliente_id']) && $data['contratacion']['cliente_id'] == $cliente['usuario_id']) {
                        echo 'selected';
                    } ?>>

                    <?= $cliente['nombre'] . " " . $cliente['apellido1'] ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="pagado" class="form-label">Pagado:</label>
        <input type="number" step="0.01" class="form-control" id="pagado" name="pagado"
               value="<?= isset($data['contratacion']['pagado']) ? $data['contratacion']['pagado'] : '' ?>"
            <?= $data['readonly'] ?? '' ?>>
    </div>
    <?php if (isset($data['title-btn-submit'])) { ?>
        <input type="submit" class="btn-save" value="<?= $data['title-btn-submit'] ?>">
    <?php } ?>

</form>