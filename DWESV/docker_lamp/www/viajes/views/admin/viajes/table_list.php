<table class="table table-striped align-middle text-center">
    <thead>
    <th class="bg-dark text-white">Codigo</th>
    <th class="bg-dark text-white">Título</th>
    <th class="bg-dark text-white">Salida</th>
    <th class="bg-dark text-white">Llegada</th>
    <th class="bg-dark text-white">Plazas</th>
    <th class="bg-dark text-white">Precio</th>
    <th class="bg-dark text-white">Foto</th>
    <th class="bg-dark text-white">Empleado</th>
    <th class="bg-dark text-white">Creación</th>
    <th class="bg-dark text-white">Modificación</th>
    <th class="bg-dark text-white" style="width: 150px">Opciones</th>
    </thead>
    <tbody>
    <?php use dao\UsuariosDao;

    $fila = 0;
    foreach ($data['viajes'] as $viaje) { ?>
        <tr>
            <td class="align-middle"><?= $viaje['codigo'] ?></td>
            <td class="align-middle"><?= $viaje['titulo'] ?></td>
            <td class="align-middle"><?= date("d-m-Y", strtotime($viaje['salida'])) ?></td>
            <td class="align-middle"><?= date("d-m-Y", strtotime($viaje['llegada'])) ?></td>
            <td class="align-middle"><?= $viaje['plazas'] ?></td>
            <td class="align-middle"><?= $viaje['precio'] ?></td>


            <td class="align-middle text-center">
                <?php if ($viaje['foto'] !== null && $viaje['foto'] != '') { ?>
                    <img src="<?= BASE_URL . '/uploads/fotos/viajes/' . $viaje['foto'] ?>"
                         style="height: 50px">
                <?php } ?>
            </td>
            <td class="align-middle text-center">
                <?php
                $usuariosDao = new UsuariosDao();
                $empleado = $usuariosDao->get($viaje['empleado_id']);
                echo $empleado['nombre'] . ' ' . $empleado['apellido1'];
                ?>
            </td>

            <td class="align-middle"><?= date("d-m-Y H:i:s", strtotime($viaje['created_at'])) ?></td>
            <td class="align-middle"><?= date("d-m-Y H:i:s", strtotime($viaje['updated_at'])) ?></td>

            <td class="align-middle text-center">

                <button class="btn px-1 btn-info rounded link-underline link-underline-opacity-0 text-center"
                        style="width: 40px; height: 40px"
                        data-bs-toggle="modal" data-bs-target="#modalForm"
                        onclick="loadViaje('<?= $viaje['codigo'] ?>')">
                    <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                </button>

                <button class="btn px-1 btn-success rounded link-underline link-underline-opacity-0 text-center"
                        style="width: 40px; height: 40px"
                        onclick="mostrarDescripcion('<?= $fila ?>')"
                        title="Ver descripción del viaje <?= $viaje['codigo'] ?>">
                    <i class="fa-solid fa-comment fa-sm" style="color: #ffffff;"></i>
                </button>

                <br>

                <a href="<?= BASE_URL ?>/viajes/update/<?= $viaje['id'] ?>"
                   class="link-underline link-underline-opacity-0 text-center"
                   title="Modificar viaje <?= $viaje['titulo'] ?>">
                    <button class="btn btn-warning text-center" style="width: 40px; height: 40px">
                        <i class="fa-solid fa-user-pen fa-sm" style="color: #ffffff;"></i>
                    </button>
                </a>

                <a href="<?= BASE_URL ?>/viajes/delete/<?= $viaje['id'] ?> "
                   class="link-underline link-underline-opacity-0 text-center"
                   title="Eliminar viaje <?= $viaje['titulo'] ?>">
                    <button class="btn btn-danger text-center" style="width: 40px; height: 40px">
                        <i class="fa-solid fa-trash-can fa-sm" style="color: #ffffff;"></i>
                    </button>
                </a>

            </td>
        </tr>
        <tr class="desc" style="display: none">
            <td colspan="11" style="height: 50px; overflow-y: auto;" class="text-start">
                <?= $viaje['descripcion'] ?>
            </td>
        </tr>
        <?php $fila++;
    } ?>
    <tbody>
</table>

<script>
    function mostrarDescripcion(fila) {
        var desc = document.getElementsByClassName('desc')[fila];
        if (desc.style.display === 'none') {
            desc.style.display = 'table-row';
        } else {
            desc.style.display = 'none';
        }
    }

    function loadViaje(codigo) {
        url = "<?=BASE_URL?>/viajes-api/get_by_codigo";
        var data = new URLSearchParams();
        data.append('codigo', codigo);

        fetch(url, {
            method: 'POST',
            body: data
        }).then(response => {
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
        var codigoEl = document.getElementById('codigo');
        if (codigoEl) {
            codigoEl.value = data.codigo;
            codigoEl.readOnly = true;
        }
        var tituloEl = document.getElementById('titulo');
        if (tituloEl) {
            tituloEl.value = data.titulo;
            tituloEl.readOnly = true;
        }
        var descripcionEl = document.getElementById('descripcion');
        if (descripcionEl) {
            descripcionEl.value = data.descripcion;
            descripcionEl.readOnly = true;
        }
        var salidaEl = document.getElementById('salida');
        if (salidaEl) {
            salidaEl.value = data.salida;
            salidaEl.readOnly = true;
        }
        var llegadaEl = document.getElementById('llegada');
        if (llegadaEl) {
            llegadaEl.value = data.llegada;
            llegadaEl.readOnly = true;
        }
        var plazasEl = document.getElementById('plazas');
        if (plazasEl) {
            plazasEl.value = data.plazas;
            plazasEl.readOnly = true;
        }
        var precioEl = document.getElementById('precio');
        if (precioEl) {
            precioEl.value = data.precio;
            precioEl.readOnly = true;
        }
        var fotoEl = document.getElementById('foto');
        if (fotoEl) {
            fotoEl.filename = data.foto;
            fotoEl.disabled = true;
        }
        var empleadoEl = document.getElementById('empleado_id');
        if (empleadoEl) {
            empleadoEl.value = data.empleado_id;
            empleadoEl.disabled = true;
        }
    }
</script>