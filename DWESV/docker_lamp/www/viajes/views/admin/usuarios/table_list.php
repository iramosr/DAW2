<table class="table table-striped align-middle text-center">
    <thead>
    <th class="bg-dark text-white">Username</th>
    <th class="bg-dark text-white">Email</th>
    <th class="bg-dark text-white">Nombre</th>
    <th class="bg-dark text-white">Primer Apellido</th>
    <th class="bg-dark text-white">Foto</th>
    <th class="bg-dark text-white">Activo</th>
    <th class="bg-dark text-white">Bloqueado</th>
    <th class="bg-dark text-white">Último acceso</th>
    <th class="bg-dark text-white" style="width: 150px">Opciones</th>
    </thead>
    <tbody>
    <?php foreach ($data['usuarios'] as $usuario) { ?>
        <tr>
            <td class="align-middle"><?= $usuario['username'] ?></td>
            <td class="align-middle"><?= $usuario['email'] ?></td>
            <td class="align-middle"><?= $usuario['nombre'] ?></td>
            <td class="align-middle"><?= $usuario['apellido1'] ?></td>

            <td class="align-middle text-center">
                <?php if ($usuario['foto'] !== null && $usuario['foto'] != '') { ?>
                    <img src="<?= BASE_URL . '/uploads/fotos/usuarios/' . $usuario['foto'] ?>"
                         style="height: 50px">
                <?php } ?>
            </td>
            <td class="align-middle text-center">
                <?php if ($usuario['activo']) { ?>
                    <span class="badge bg-success">Sí</span>
                <?php } else { ?>
                    <span class="badge bg-danger">No</span>
                <?php } ?>
            </td>
            <td class="align-middle text-center">
                <?php if ($usuario['bloqueado']) { ?>
                    <span class="badge bg-success">Sí</span>
                <?php } else { ?>
                    <span class="badge bg-danger">No</span>
                <?php } ?>
            </td>
            <td class="align-middle text-center"><?= date("d-m-Y", strtotime($usuario['ultimo_acceso'])) ?></td>

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
            fotoEl.filename = data.foto;
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
            rolAdminEl.checked = data.roles.includes('ADMIN');
            rolAdminEl.disabled = true;
        }
        else {
            rolAdminEl.checked = false;
        }
        var rolEmpleadoEl = document.getElementById('rolEmpleado');
        if (rolEmpleadoEl) {
            rolEmpleadoEl.checked = data.roles.includes('EMPLE')
            rolEmpleadoEl.disabled = true;
        }
        else {
            rolEmpleadoEl.checked = false;
        }
        var rolClienteEl = document.getElementById('rolCliente');
        if (rolClienteEl) {
            rolClienteEl.checked = data.roles.includes('CLIENTE');
            rolClienteEl.disabled = true;
        }else {
            rolClienteEl.checked = false;
        }
    }
</script>