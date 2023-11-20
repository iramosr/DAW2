<?php
namespace dao;

use libs\Dao;
use PDOException;

class UsuariosRolesDao extends Dao{
    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'usuarios_roles';
    }

    public function itemsTable(): string
    {
        return "id, usuario_id, rol_id";
    }

    protected function _add($data): object
    {
        $sql = 'INSERT INTO ' . $this->tableName() . ' (' . $this->itemsTable() . ') VALUES (NULL, :usuarioId, :rolId)';
        $query = $this->pdo->prepare($sql);
        $usuarioId = $data['usuario_id'] ?? null;
        $rolId = $data['rol_id'] ?? null;
        $query->bindParam(':usuarioId', $usuarioId);
        $query->bindParam(':rolId', $rolId);
        return $query;
    }


    public function update(int $id, $datos): bool
    {
        return false;
    }
}
