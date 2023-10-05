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
        return "id, codigo, descripcion, precio, salida, llegada, foto, created_at, updated_at";
    }

    protected function _add($data): object
    {
        $createdAt = $updatedAt = date("Y-m-d H:i:s");
        $sql = 'INSERT INTO ' . $this->tableName() . '(' . $this->itemsTable() . ')' . 'VALUES(null, :codigo, :descripcion, :precio, :salida, :llegada, :foto, :createdAt, :updatedAt)';
        $query = $this->pdo->prepare($sql);
        $codigo = $data['codigo'] ?? null;
        $descripcion = $data['descripcion'] ?? null;
        $precio = $data['precio'] ?? null;
        $salida = $data['salida'] ?? null;
        $llegada = $data['llegada'] ?? null;
        $foto = $data['foto'] ?? null;

        $query->bindParam(':codigo', $codigo);
        $query->bindParam(':descripcion', $descripcion);
        $query->bindParam(':precio', $precio);
        $query->bindParam(':salida', $salida);
        $query->bindParam(':llegada', $llegada);
        $query->bindParam(':foto', $foto);
        $query->bindParam(':createdAt', $createdAt);
        $query->bindParam(':updatedAt', $updatedAt);
        return $query;
    }

    public function update(int $id, object $datos): bool
    {
        // TODO: Implement update() method.
    }

    public function getByCodigo(String $codigo){
        $sql = $this->select() . " WHERE codigo LIKE :codigo";
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':codigo', $codigo);
        $query->execute();
        $viaje = $query->fetchAll(PDO::FETCH_ASSOC);
        if($viaje == null){
            return "No existe el viaje con el código $codigo";
        }
        return $viaje;
    }
}