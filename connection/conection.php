<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "crud";


try{
$pdo = new PDO("mysql:host=$host;dbname=$db",$user,$password);
} catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}



