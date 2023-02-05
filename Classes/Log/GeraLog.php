<?php
namespace Classes\Log;

use PDOException;
require __DIR__ . "/../Autoload.php";

class GeraLog 
{
    public static function ErroLogSql($sql, $value, $e)
    {   
        $path = __DIR__ . "/../../Logs/erroLog.log";
        $handle = fopen($path, "a+");
        fwrite($handle, str_repeat("-",120) . PHP_EOL);
        fwrite($handle, "Data:" . date("d/m/Y H:i:s") . PHP_EOL);
        fwrite($handle, $sql . PHP_EOL);
        fwrite($handle, implode($value) . PHP_EOL);
        fwrite($handle, $e . PHP_EOL);
        fwrite($handle, str_repeat("-",120) . PHP_EOL);
        fclose($handle);

        throw new PDOException("SQL:" . $sql . " Value:" . implode($value) . " Erro:" . $e);
    }

    public static function erroDb($e)
    {
        $path = __DIR__ . "/../../Logs/erroLog.log";
        $handle = fopen($path, "a+");
        fwrite($handle, str_repeat("-",120) . PHP_EOL);
        fwrite($handle, "Data:" . date("d/m/Y H:i:s") . PHP_EOL);
        fwrite($handle, $e . PHP_EOL);
        fwrite($handle, str_repeat("-",120) . PHP_EOL);
        fclose($handle);
    }
}