<?php
include 'conection.php';



if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['dinheiro'])){
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $email =  filter_var($email, FILTER_VALIDATE_EMAIL);
    $dinheiro = htmlspecialchars($_POST['dinheiro']);
    $dinheiro = number_format($dinheiro, 2, ',', '.');
    $idGet = $_POST['id'];


 try{
 if(isset($idGet) && isset($nome) && isset($email) && isset($dinheiro)){
       $stmtEditUser = $pdo->prepare("UPDATE dados SET nome = :nome, email = :email, dinheiro = :dinheiro WHERE id = :id");
       $stmtEditUser->bindValue(":nome",$nome);
       $stmtEditUser->bindValue(":email",$email);
       $stmtEditUser->bindValue(":dinheiro",$dinheiro);
         $stmtEditUser->bindValue(":id",$idGet);
       $stmtEditUser->execute();
       header("Location: index.php");
       exit();
    }
 } catch(PDOException $e){
     echo "Error: ".$e->getMessage();
 }
 

}



?>