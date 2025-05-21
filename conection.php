<?php

$host = "your host";
$user = "your user";
$password = "your password";
$db = "your dataBase";


try{
$pdo = new PDO("mysql:host=$host;dbname=$db",$user,$password);
} catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}



