<?php

namespace dao;
use \libs\Dao;
require_once (__DIR__ . '/../libs/Dao.php');


class EncuestasDao extends Dao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'encuestas';
        // TODO: Implement tableName() method.
    }

    public function itemsTable(): string
    {
        return "id, nombre, apellidos, email, fecha_nacimiento, sexo, aficiones, estudios, observaciones,
            foto, created_at, updated_at";
        // TODO: Implement itemsTable() method.
    }

    protected function _add($data): object
    {
        $createdAt = $updateAt = date("Y-m-d H:i:s");

        $sql = 'INSERT INTO ' . $this->tableName() . ' ( ' . $this->itemsTable() . ' ) ' .
            'VALUES (null, :nombre, :apellidos, :email, :fecha_nacimiento, :sexo, :aficiones, :estudios,
            :observaciones, :foto, :createdAt,:updatedAt )';

        $query = $this->pdo->prepare($sql);
        $nombre = $data['nombre'] ?? null;
        $apellidos = $data['apellidos'] ?? null;
        $email = $data['email'] ?? null;
        $fecha_nacimiento = $data['fecha_nacimiento'] ?? null;
        $sexo = $data['sexo'] ?? null;
        $aficiones = $data['aficiones'] ?? null;
        $estudios = $data['estudios'] ?? null;
        $observaciones = $data['observaciones'] ?? null;
        $foto = $data['foto'] ?? null;

        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellidos', $apellidos);
        $query->bindParam(':email', $email);
        $query->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $query->bindParam(':sexo', $sexo);
        $query->bindParam(':aficiones', $aficiones);
        $query->bindParam(':estudios', $estudios);
        $query->bindParam(':observaciones', $observaciones);
        $query->bindParam(':foto', $foto);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updateAt);

        return $query;

        // TODO: Implement _add() method.
    }

    public function update(int $id, object $datos): bool
    {
        // TODO: Implement update() method.
    }
}