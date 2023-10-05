<?php
require_once "Dao.php";

class ClientesViajesDao extends Dao
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'clientes_viajes';
    }

    public function itemsTable(): string
    {
        return "id, cliente_id, viaje_id, pagado, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . '(' . $this->itemsTable() . ')' . 'VALUES(null, :cliente_id, :viaje_id, :pagado, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $clienteid = $data['cliente_id'] ?? null;
        $viajeid = $data['viaje_id'] ?? null;
        $pagado = $data['pagado'] ?? null;
        $nombre = $data['nombre'] ?? null;

        $query->bindParam(':cliente_id', $clienteid);
        $query->bindParam(':viaje_id', $viajeid);
        $query->bindParam(':pagado', $pagado);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);
        return $query;
    }

    public function update(int $id, object $datos): bool
    {
        // TODO: Implement update() method.
    }

    //
}