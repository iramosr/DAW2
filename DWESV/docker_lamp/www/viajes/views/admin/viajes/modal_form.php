<!-- Modal -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <form action="<?= $data['accion'] ?? '' ?>" method="post" enctype="multipart/form-data" class="w-100">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="#modalFormLabel">VIAJE</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código:<sup>*</sup></label>
                        <input type="text" class="form-control" id="codigo" name="codigo"
                               value="<?= isset($data['viaje']['codigo']) ? $data['viaje']['codigo'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:<sup>*</sup></label>
                        <input type="titulo" class="form-control" id="titulo" name="titulo"
                               value="<?= isset($data['viaje']['titulo']) ? $data['viaje']['titulo'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" <?= $data['readonly'] ?? '' ?>><?= isset($data['viaje']['descripcion']) ? $data['viaje']['descripcion'] : '' ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="salida" class="form-label">Salida:<sup>*</sup></label>
                        <input type="datetime-local" class="form-control" id="salida" name="salida"
                               value="<?= isset($data['viaje']['salida']) ? $data['viaje']['salida'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
                    </div>
                    <div class="mb-3">
                        <label for="llegada" class="form-label">Llegada:<sup>*</sup></label>
                        <input type="datetime-local" class="form-control" id="llegada" name="llegada"
                               value="<?= isset($data['viaje']['llegada']) ? $data['viaje']['llegada'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?> required>
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
                        <label for="empleado_id" class="form-label">Empleado:<sup>*</sup></label>
                        <select class="form-select" id="empleado_id" name="empleado_id" <?= $data['disabled'] ?? '' ?> required>
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

                                    <?=  $empleado['usuario_id'] . "-" . $empleado['nombre'] . " " . $empleado['apellido1'] ?>
                                </option>
                            <?php } ?>
                        </select>
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