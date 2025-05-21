<?php
include "conection.php";


    $idGet = $_GET['id'];

 try{
 
       $stmtDeleteUser = $pdo->prepare("DELETE FROM dados WHERE id = :id");
       $stmtDeleteUser->bindValue(":id",$idGet);
       $stmtDeleteUser->execute();
       header("Location: index.php");
       exit();
  
 } catch(PDOException $e){
     echo "Error: ".$e->getMessage();
 }
 




?>


