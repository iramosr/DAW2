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
                <a href="<?= BASE_URL ?>/usuarios/show/<?= $usuario['username'] ?>"
                   class="link-underline link-underline-opacity-0 text-center"
                   title="Ver usuario <?= $usuario['username'] ?>">
                    <button class="btn btn-info text-center" style="width: 40px; height: 40px">
                        <i class="fa-solid fa-eye fa-sm" style="color: #ffffff;"></i>
                    </button>
                </a>

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