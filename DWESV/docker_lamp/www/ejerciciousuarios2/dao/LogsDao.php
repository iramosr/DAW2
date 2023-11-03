<?php
namespace dao;

use libs\Dao;
use PDOException;

class LogsDao extends Dao{
    public function __construct()
    {
        parent::__construct();
    }

    public function tableName(): string
    {
        return 'logs';
    }

    public function itemsTable(): string
    {
        return "id, log_type, log_date, log_message";
    }

    protected function _add($data): object
    {
        $sql = 'INSERT INTO ' . $this->tableName() . ' (' . $this->itemsTable() . ') VALUES (NULL, :logType, :createdAt, :logMessage)';
        $query = $this->pdo->prepare($sql);
        $query->bindParam(':logType', $data['logType']);
        $query->bindParam(':createdAt', $data['createdAt']);
        $query->bindParam(':logMessage', $data['logMessage']);
        return $query;
    }

    public function insertLog($logType, $logMessage)
    {
        $createdAt = date("Y-m-d H:m:s");

        $data = [
            'logType' => $logType,
            'createdAt' => $createdAt,
            'logMessage' => $logMessage
        ];

        try {
            $query = $this->_add($data);
            $query->execute();
        } catch (PDOException $e) {

        }
    }

    public function getLogs()
    {
        $sql = 'SELECT ' . $this->itemsTable() . ' FROM ' . $this->tableName();
        $query = $this->pdo->query($sql);
        $logs = $query->fetchAll(PDO::FETCH_ASSOC);
        return $logs;
    }

    public function update(int $id, $datos): bool
    {
        // TODO: Implement update() method.
    }
}
