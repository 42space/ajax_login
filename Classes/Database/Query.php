<?php
namespace Classes\Database;

use PDO;
use PDOException;
use Classes\Log\GeraLog;

class Query 
{
    public $nrows = 0;
    public $Connection;
    public $Log;
    public $retornoSql;
    
    public function __construct()
    {
        $this->Connection = new Connection();
    }
    
    public function stateConnection()
    {
        if ($this->Connection->status == 1) {
            return "Connected to the Bank"; 
        }
        return "Not Connected to the Bank";
    }

    public function select($sql, $values)
    {
        if ($this->Connection->status == 0) exit();

        try {
            $this->startTrasaction();
            $this->retornoSql = $this->Connection->pdo->prepare($sql);
            $this->retornoSql->execute($values);
            $retorno = $this->retornoSql->fetchAll(PDO::FETCH_ASSOC);
            $this->nrows = $this->retornoSql->rowCount();
            $this->doneTransaction();
        }
        catch(PDOException $e) {
            $this->cancelTransaction();
            GeraLog::ErroLogSql($sql, $values, $e);
        }
        return $retorno;
    }

    public function insert($sql, $values) 
    {
        if ($this->Connection->status == 0) exit();

        try {
            $this->startTrasaction();
            $stmt = $this->Connection->pdo->prepare($sql);
            $stmt->execute($values);
            $this->doneTransaction();
        }
        catch (PDOException $e) {
            $this->cancelTransaction();
            GeraLog::ErroLogSql($sql, $values, $e);
        }
    }

    public function startTrasaction() 
    {
        if ($this->Connection->status == 0) exit();
        return $this->Connection->pdo->beginTransaction();
    }

    public function doneTransaction() 
    {
        return $this->Connection->pdo->commit();
    }

    public function cancelTransaction() 
    {
        return $this->Connection->pdo->rollBack();
    }
}