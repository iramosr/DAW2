<?php
namespace dao;

use libs\Dao;

class UsuariosDao extends Dao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'usuarios';
    }

    public function itemsTable(): string
    {
        return "id, username, password, email, nombre, apellido1, apellido2, foto, activo,
         bloqueado, num_intentos, ultimo_acceso, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . ' (' . $this->itemsTable() . ') ' .
            'VALUES (null, :username, :password, :email, :nombre, :apellido1, :apellido2, :foto, :activo, :bloqueado, :num_intentos, :ultimo_acceso, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;
        $email = $data['email'] ?? null;
        $nombre = $data['nombre'] ?? null;
        $apellido1 = $data['apellido1'] ?? null;
        $apellido2 = $data['apellido2'] ?? null;
        $foto = $data['foto'] ?? null;
        $activo = $data['activo'] ?? null;
        $bloqueado = $data['bloqueado'] ?? null;
        $num_intentos = $data['num_intentos'] ?? null;
        $ultimo_acceso = $data['ultimo_acceso'] ?? null;

        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->bindParam(':email', $email);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellido1', $apellido1);
        $query->bindParam(':apellido2', $apellido2);
        $query->bindParam(':foto', $foto);
        $query->bindParam(':activo', $activo);
        $query->bindParam(':bloqueado', $bloqueado);
        $query->bindParam(':num_intentos', $num_intentos);
        $query->bindParam(':ultimo_acceso', $ultimo_acceso);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);
        dep($query);
        return $query;
    }

    public function update(int $id, object $datos): bool
    {
        // TODO: Implement update() method.
    }
}