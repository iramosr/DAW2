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

    //Metodo que devuelva todos los clientes de un viaje
    public function getClientesByViajeId(int $id){
        $sql = 'SELECT * FROM `clientes` INNER JOIN '.$this->tableName().' ON `'.$this->tableName().'`.cliente_id = `clientes`.id WHERE `'.$this->tableName().'`.viaje_id=:id';
        echo $sql;
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $clientes = $query->fetchAll(PDO::FETCH_ASSOC);
        if($clientes == null){
            return "No existen clientes para el viaje con el id $id";
        }
        return $clientes;
    }
}