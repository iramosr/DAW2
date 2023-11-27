<?php
namespace dao;

use http\Params;
use libs\Dao;

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
        return "id, codigo, titulo, descripcion, salida, llegada, 
        plazas, precio, foto, empleado_id, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . ' (' . $this->itemsTable() . ') ' .
            'VALUES (null, :codigo, :titulo, :descripcion, :salida, :llegada, :plazas, 
            :precio, :foto, :empleadoId, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $codigo = $data['codigo'] ?? null;
        $titulo = $data['titulo'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $salida = $data['salida'] ?? null;
        $llegada = $data['llegada'] ?? null;
        $plazas = $data['plazas'] ?? null;
        $precio = $data['precio'] ?? null;
        $foto = $data['foto'] ?? null;
        $empleadoId = $data['empleado_id'] ?? null;

        $query->bindParam(':codigo', $codigo);
        $query->bindParam(':titulo', $titulo);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':salida', $salida);
        $query->bindParam(':llegada', $llegada);
        $query->bindParam(':plazas', $plazas);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':foto', $foto);
        $query->bindParam(':empleadoId', $empleadoId);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);


        return $query;
    }

    public function update(int $id, $data): bool
    {
        try{
            $updatedAt = date("Y-m-d H:i:s");
            $sql = 'UPDATE ' . $this->tableName() . ' SET 
            codigo = :codigo,
            titulo = :titulo,
            descripcion = :descripcion,
            salida = :salida,
            llegada = :llegada,
            plazas = :plazas,
            precio = :precio,
            foto = :foto,
            empleado_id = :empleadoId,
            updated_at = :updatedAt
            WHERE id = :id';

            $query = $this->pdo->prepare($sql);
            $query->bindParam(':id', $id);
            $query->bindParam(':codigo', $data['codigo']);
            $query->bindParam(':titulo', $data['titulo']);
            $query->bindParam(':descripcion', $data['descripcion']);
            $query->bindParam(':salida', $data['salida']);
            $query->bindParam(':llegada', $data['llegada']);
            $query->bindParam(':plazas', $data['plazas']);
            $query->bindParam(':precio', $data['precio']);
            $query->bindParam(':foto', $data['foto']);
            $query->bindParam(':empleadoId', $data['empleado_id']);
            $query->bindParam(':updatedAt', $updatedAt);

            $query->execute();
            return true;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }

    }
    public function getByCodigo($codigo):?array
    {
        $sql = $this->select() . ' WHERE codigo=:codigo';
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':codigo', $codigo);
        $query->execute();
        $row = $query->fetch(\PDO::FETCH_ASSOC);
        return $row !== false ? $row : null;
    }
}