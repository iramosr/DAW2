<table class="table table-striped align-middle text-center">
    <thead>
    <th class="bg-dark text-white">Viaje</th>
    <th class="bg-dark text-white">Empleado</th>
    <th class="bg-dark text-white">Pagado</th>
    <th class="bg-dark text-white" style="width: 150px">Opciones</th>
    </thead>
    <tbody>
    <?php use dao\UsuariosDao;
    use dao\ViajesDao;
    $usuariosDao = new UsuariosDao();
    $viajesDao = new ViajesDao();
    foreach ($data['contrataciones'] as $contratacion) {?>
        <tr>
            <td class="align-middle text-center">
                <?php
                $viaje = $viajesDao->get($contratacion['viaje_id']);
                echo $viaje['codigo'] . ' - ' . $viaje['titulo'];
                ?>
            </td>
            <td class="align-middle text-center">
                <?php
                $empleado = $usuariosDao->get($viaje['empleado_id']);
                echo $empleado['nombre'] . ' ' . $empleado['apellido1'];
                ?>
            </td>

            <td class="align-middle text-center">
                <?= $contratacion['pagado'] ?>
            </td>

            <td class="align-middle text-center">

                <button class="btn px-1 btn-info rounded link-underline link-underline-opacity-0 text-center"
                        style="width: 40px; height: 40px"
                        data-bs-toggle="modal" data-bs-target="#modalForm"
                        onclick="loadContratacion('<?= $contratacion['id'] ?>')">
                    <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                </button>

                <a href="<?= BASE_URL ?>/contrataciones/update/<?= $contratacion['id'] ?>"
                   class="link-underline link-underline-opacity-0 text-center"
                   title="Modificar contratacion">
                    <button class="btn btn-warning text-center" style="width: 40px; height: 40px">
                        <i class="fa-solid fa-user-pen fa-sm" style="color: #ffffff;"></i>
                    </button>
                </a>

                <a href="<?= BASE_URL ?>/contrataciones/delete/<?= $contratacion['id'] ?> "
                   class="link-underline link-underline-opacity-0 text-center"
                   title="Eliminar viaje">
                    <button class="btn btn-danger text-center" style="width: 40px; height: 40px">
                        <i class="fa-solid fa-trash-can fa-sm" style="color: #ffffff;"></i>
                    </button>
                </a>

            </td>
        </tr>
    <?php } ?>
    <tbody>
</table>

<script>
    function loadContratacion(id) {
        url = "<?=BASE_URL?>/contratacioness-api/get";
        var data = new URLSearchParams();
        data.append('id', id);
        fetch(url, {
            method: 'POST',
            body: data
        })
        .then(response => {
            if (response.status === 200) {
                return response.json();
            } else {
                throw new Error('Error en la solicitud');
            }
        })
            .then(data => {
                asignaCampos(data);
            })
            .catch(error => {
                console.log("Error" + error);
            });
    }

    function asignaCampos(data) {
        var viajeEl = document.getElementById('viaje_id');
        if (viajeEl) {
            viajeEl.value = data.viaje_id;
            viajeEl.disabled = true;
        }
        var clienteEl = document.getElementById('cliente_id');
        if (clienteEl) {
            clienteEl.value = data.cliente_id;
            clienteEl.disabled = true;
        }
        var pagadoEl = document.getElementById('pagado');
        if (pagadoEl) {
            pagadoEl.value = data.pagado;
            pagadoEl.readOnly = true;
        }

    }
</script>