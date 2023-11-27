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
                        <input type="text" class="form-control" id="codigo" name="codigo"
                               value="<?= isset($data['viaje']['codigo']) ? $data['viaje']['codigo'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?>>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="titulo" class="form-control" id="titulo" name="titulo"
                               value="<?= isset($data['viaje']['titulo']) ? $data['viaje']['titulo'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?>>
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
                        <label for="empleado" class="form-label">Empleado:</label>
                        <input type="text" class="form-control" id="empleado" name="empleado"
                               value="<?= isset($data['viaje']['empleado']) ? $data['viaje']['empleado'] : '' ?>"
                            <?= $data['readonly'] ?? '' ?>>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>