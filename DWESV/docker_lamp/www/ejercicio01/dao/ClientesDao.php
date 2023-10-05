<?php
require_once "Dao.php";

class ClientesDao extends Dao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'clientes';
    }

    public function itemsTable(): string
    {
        return "id, nif, nombre, apellido1, apellido2, email, foto, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . '(' . $this->itemsTable() . ')' . 'VALUES(null, :nif, :nombre, :apellido1, :apellido2, :email, :foto, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $nif = $data['nif'] ?? null;
        $nombre = $data['nombre'] ?? null;
        $apellido1 = $data['apellido1'] ?? null;
        $apellido2 = $data['apellido2'] ?? null;
        $email = $data['email'] ?? null;
        $foto = $data['foto'] ?? null;

        $query->bindParam(':nif', $nif);
        $query->bindParam(':nombre', $nombre);
        $query->bindParam(':apellido1', $apellido1);
        $query->bindParam(':apellido2', $apellido2);
        $query->bindParam(':email', $email);
        $query->bindParam(':foto', $foto);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);
        return $query;
    }

    public function update(int $id, object $datos): bool
    {
        // TODO: Implement update() method.
    }

    //Devuelve las últimas rows filas en orden descendente según created_at

    public function last(int $rows){
        $sql = $this->select() . ' ORDER BY created_at DESC LIMIT :rows';
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':rows', $rows);
        $query->execute();
        $list = $query->fetchAll(PDO::FETCH_ASSOC);
        return $list;
    }
}