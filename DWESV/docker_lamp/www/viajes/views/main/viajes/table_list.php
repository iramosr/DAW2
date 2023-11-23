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
    <th class="bg-dark text-white" style="width: 150px">Opciones</th>
    </thead>
    <tbody>
    <?php foreach ($data['viajes'] as $viaje) { ?>
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
            <td class="align-middle text-center"><?= $viaje['empleado']?></td>


            <td class="align-middle text-center">

                <button class="btn px-1 btn-info rounded link-underline link-underline-opacity-0 text-center"
                        style="width: 40px; height: 40px"
                        data-bs-toggle="modal" data-bs-target="#modalForm"
                        onclick="loadUsuario('<?= $usuario['username'] ?>')">
                    <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                </button>

                <a href="<?= BASE_URL ?>/usuarios/update/<?= $usuario['id'] ?>"
                   class="link-underline link-underline-opacity-0 text-center"
                   title="Modificar usuario <?= $usuario['username'] ?>">
                    <button class="btn btn-warning text-center" style="width: 40px; height: 40px">
                        <i class="fa-solid fa-user-pen fa-sm" style="color: #ffffff;"></i>
                    </button>
                </a>

                <a href="<?= BASE_URL ?>/usuarios/delete/<?= $usuario['id'] ?> "
                   class="link-underline link-underline-opacity-0 text-center"
                   title="Eliminar usuario <?= $usuario['username'] ?>">
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
    function loadUsuario(username) {
        url = "<?=BASE_URL?>/usuarios-api/get_by_username";
        var data = new URLSearchParams();
        data.append('username', username);
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
        var usernameEl = document.getElementById('username');
        if (usernameEl) {
            usernameEl.value = data.username;
            usernameEl.readOnly = true;
        }
        var passwordEl = document.getElementById('password');
        if (passwordEl) {
            passwordEl.readOnly = true;
        }
        var emailEl = document.getElementById('email');
        if (emailEl) {
            emailEl.value = data.email;
            emailEl.readOnly = true;
        }
        var nombreEl = document.getElementById('nombre');
        if (nombreEl) {
            nombreEl.value = data.nombre;
            nombreEl.readOnly = true;
        }
        var apellido1El = document.getElementById('apellido1');
        if (apellido1El) {
            apellido1El.value = data.apellido1;
            apellido1El.readOnly = true;
        }
        var apellido2El = document.getElementById('apellido2');
        if (apellido2El) {
            apellido2El.value = data.apellido2;
            apellido2El.readOnly = true;
        }
        var fotoEl = document.getElementById('foto');
        if (fotoEl) {
            fotoEl.value = data.foto;
            fotoEl.disabled = true;
        }
        var actEl = document.getElementById('act');
        if (actEl) {
            actEl.checked = data.activo;
            actEl.disabled = true;
        }
        var bloqEl = document.getElementById('bloq');
        if (bloqEl) {
            bloqEl.checked = data.bloqueado;
            bloqEl.disabled = true;
        }
        var rolAdminEl = document.getElementById('rolAdmin');
        if (rolAdminEl) {
            rolAdminEl.checked = data.rolAdmin;
            rolAdminEl.disabled = true;
        }
        var rolEmpleadoEl = document.getElementById('rolEmpleado');
        if (rolEmpleadoEl) {
            rolEmpleadoEl.checked = data.rolEmpleado;
            rolEmpleadoEl.disabled = true;
        }
        var rolClienteEl = document.getElementById('rolCliente');
        if (rolClienteEl) {
            rolClienteEl.checked = data.rolCliente;
            rolClienteEl.disabled = true;
        }
    }
</script>