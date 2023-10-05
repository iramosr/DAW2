<?php
require_once "Dao.php";

class ViajesDao extends Dao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'viajes';
    }

    public function itemsTable(): string
    {
        return "id, codigo, descripcion, precio, salida, llegada, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . '(' . $this->itemsTable() . ')' . 'VALUES(null, :codigo, :descripcion, :precio, :salida, :llegada, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $codigo = $data['codigo'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $precio = $data['precio'] ?? null;
        $salida = $data['salida'] ?? null;
        $llegada = $data['llegada'] ?? null;

        $query->bindParam(':codigo', $codigo);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':salida', $salida);
        $query->bindParam(':llegada', $llegada);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);
        return $query;
    }

    public function update(int $id, object $datos): bool
    {
        // TODO: Implement update() method.
    }
}