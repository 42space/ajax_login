<?php
namespace Classes\Database;

use Classes\Log\GeraLog;
use PDOException;
use PDO;

class Connection 
{
    private $host = "127.0.0.1";
    private $user = "postgres";
    private $pass = "postgres";
    private $db   = "test"; #Put your bank name.

    public $pdo;
    public $status = 0;

    public function __construct()
    {
        $this->Connect();
    }

    public function Connect()
    {
        try {
            $this->pdo = new PDO("pgsql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->status = 1;
        }
        catch (PDOException $e) {
            GeraLog::erroDb($e);
        }
        return $this->pdo;
    }

    public function __destruct()
    {
        $this->pdo    = null;
        $this->status = 0;
    }
}