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
                        <label for="codigo" class="form-label">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo">
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="titulo" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="mb-3">
                        <label for="salida" class="form-label">Salida:</label>
                        <input type="datetime-local" class="form-control" id="salida" name="salida">
                    </div>
                    <div class="mb-3">
                        <label for="llegada" class="form-label">Llegada:</label>
                        <input type="datetime-local" class="form-control" id="llegada" name="llegada">
                    </div>
                    <div class="mb-3">
                        <label for="plazas" class="form-label">Plazas:</label>
                        <input type="number" step="1" class="form-control" id="plazas" name="plazas">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio">
                    </div>
                    <div class="mb-3">
                        <label for="empleado_id" class="form-label">Empleado:</label>
                        <select class="form-select" id="empleado_id" name="empleado_id">
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

                                    <?= $empleado['usuario_id'] . "-" . $empleado['nombre'] . " " . $empleado['apellido1'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <img src="" id="foto" style="max-height: 200px;" alt="">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>