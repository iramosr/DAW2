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
        return "id, pagado, viaje_id, usuario_id, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . ' (' . $this->itemsTable() . ') ' .
            'VALUES (null, :pagado, :viajeId, :usuarioID, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $pagado = $data['pagado'] ?? null;
        $viajeId = $data['viaje_id'] ?? null;
        $usuarioId = $data['usuario_id'] ?? null;

        $query->bindParam(':pagado', $pagado);
        $query->bindParam(':viajeId', $viajeId);
        $query->bindParam(':usuarioId', $usuarioId);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);


        return $query;
    }

    public function update(int $id, $data): bool
    {
        try {
            $sql = 'UPDATE ' . $this->tableName() . ' SET 
        pagado = :pagado,
        viaje_id = :viajeId,
        usuario_id = :usuarioId,
        updated_at = :updatedAt
        WHERE id = :id';

            $query = $this->pdo->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':pagado', $data['pagado']);
            $query->bindParam(':viajeId', $data['viaje_id']);
            $query->bindParam(':usuarioId', $data['usuario_id']);
            $query->bindParam(':updatedAt', $updatedAt);

            $query->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}