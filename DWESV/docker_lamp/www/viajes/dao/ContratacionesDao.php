<?php

namespace dao;

use http\Params;
use libs\Dao;

class ContratacionesDao extends Dao
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'contrataciones';
    }

    public function itemsTable(): string
    {
        return "id, pagado, viaje_id, cliente_id, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . ' (' . $this->itemsTable() . ') ' .
            'VALUES (null, :pagado, :viajeId, :clienteId, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $pagado = $data['pagado'] ?? null;
        $viajeId = $data['viaje_id'] ?? null;
        $clienteId = $data['cliente_id'] ?? null;

        $query->bindParam(':pagado', $pagado);
        $query->bindParam(':viajeId', $viajeId);
        $query->bindParam(':clienteId', $clienteId);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);


        return $query;
    }

    public function update(int $id, $data): bool
    {
        try {
            $updatedAt = date("Y-m-d H:i:s");
            $sql = 'UPDATE ' . $this->tableName() . ' SET 
            pagado = :pagado,
            viaje_id = :viajeId,
            cliente_id = :clienteId,
            updated_at = :updatedAt
            WHERE id = :id';

            $query = $this->pdo->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':pagado', $data['pagado']);
            $query->bindParam(':viajeId', $data['viaje_id']);
            $query->bindParam(':clienteId', $data['cliente_id']);
            $query->bindParam(':updatedAt', $updatedAt);
            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getByUser($id): array
    {
        $sql = 'SELECT ' . $this->itemsTable() . ' FROM ' . $this->tableName() . ' WHERE cliente_id = :id';
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }

    public function getByViaje($id): array
    {
        $sql = 'SELECT ' . $this->itemsTable() . ' FROM ' . $this->tableName() . ' WHERE viaje_id = :id';
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }
}