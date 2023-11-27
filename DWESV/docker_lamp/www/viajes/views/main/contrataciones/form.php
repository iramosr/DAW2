<form action="<?= $data['accion'] ?? '' ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <input type="hidden" name="viaje_id" value="<?=$data['contratacion']['viaje_id']?>">
        <label for="viaje" class="form-label">Viaje:</label>
        <select class="form-select" id="viaje" name="viaje_id" disabled>
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
        <label for="cliente" class="form-label">Cliente:</label>
        <input type="hidden" name="cliente_id" value="<?=$data['contratacion']['cliente_id']?>">
        <select class="form-select" id="cliente" name="cliente_id" disabled>
            <option value="<?= $_SESSION['usuario']['id'] ?>" selected>
                <?= $_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellido1'] ?>
            </option>
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