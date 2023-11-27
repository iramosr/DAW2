<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form action="<?= $data['accion'] ?? '' ?>" method="post" enctype="multipart/form-data"
              class="w-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="#modalFormLabel">VIAJE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="viaje_id" class="form-label">Viaje:<sup>*</sup></label>
                        <select class="form-select" id="viaje_id" name="viaje_id" <?= $data['disabled'] ?? '' ?> required>
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
                            <?php };?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Cliente:<sup>*</sup></label>
                        <select class="form-select" id="cliente_id" name="cliente_id" <?= $data['disabled'] ?? '' ?> required>
                            <option value="0" <?php if (!isset($data['contratacion']['cliente_id'])) {
                                echo 'selected';
                            } ?>>
                                Seleccione un cliente
                            </option>
                            <?php foreach ($data['clientes'] as $cliente) {?>
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