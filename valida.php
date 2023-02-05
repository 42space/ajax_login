<?php
require __DIR__ . "/Classes/Autoload.php";

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

$Login = new \Classes\Login\Login();
$return = [];
$return["erro"] = true;

if (!$Login->verifyUser($username, $password)) {
    echo json_encode($return);
    exit();   
}

#Login successful 
#You can create a token to return to the front and continue with your app