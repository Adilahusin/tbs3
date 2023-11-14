<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "tbs3";

$dsn = "mysql:host=$server;dbname=$dbname;";

try {
    $pdo = new PDO($dsn, $username, $password);

    //echo "connection successful";

}catch(PDOException $e){
    echo "connection failed". $e-> getMessage();
}