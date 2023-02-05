<?php
namespace Classes\Login;

use Classes\Database\Query;
class Login 
{
    public function verifyUser(string $username, string $password)
    {
        #check the fields   
        if (!self::returnFieldNotEmpty($username) || !self::returnFieldNotEmpty($password)) {
            return false;
        }
        
        $passwordLogin     = self::encryptedPassword($password);
        $passwordLoginHash = self::setHash($passwordLogin);

        #if the user does not exist in the database,
        #if the user does not exist, it returns empty
        $passwordDb = self::getPassword($username);
        

        if (empty($passwordDb)) {
            return false;
        }

        if (self::verifyPasswordAndHash($passwordDb, $passwordLoginHash)){
            return true;
        }
        return false;
    }

    private static function returnFieldNotEmpty($field)
    {
        if (!empty($field)) {
            return trim(htmlspecialchars($field));
        }
        return false;
    }

    private function verifyPasswordAndHash($passDb, $hash)
    {   
        if (password_verify($passDb, $hash)) {
            return true;
        }
        return false;
    }

    private static function getPassword($username)
    {
        $Query = new Query();
        $sql = "select password
        from system.user
        where
        username = ?
        limit 1";
        $results = $Query->select($sql, [$username]);

        if ($Query->nrows != 0) {
            return $results[0]["password"];
        }
        return "";
    }

    private static function getPrivateKey()
    {
        return "e+n.bhJ;f,#(X9tsPq94^[3}J('7vW"; #I recommend changing this code
    }

    private static function encryptedPassword($password)
    {   
        $privateKey = self::getPrivateKey();
        return hash_hmac("sha256", $password, $privateKey);
    }

    private static function setHash($encryptedPassword)
    {
        return password_hash($encryptedPassword, PASSWORD_DEFAULT);
    }
}

