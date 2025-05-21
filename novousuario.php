<?php
include "conection.php";

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['dinheiro'])){
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $email =  filter_var($email, FILTER_VALIDATE_EMAIL);
    $dinheiro = htmlspecialchars($_POST['dinheiro']);
    $dinheiro = number_format($dinheiro, 2, ',', '.');

    $data = [
        'nome' => $nome,
        'email' => $email,
        'dinheiro' => $dinheiro,
    ];
    
 try{
 $query = 'INSERT INTO dados (nome,email,dinheiro) VALUES (:nome,:email,:dinheiro)';
  $stmt =$pdo->prepare($query);
  $stmt->bindValue(':nome', $nome);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':dinheiro', $dinheiro);
  $stmt->execute($data);
  header("location:index.php");
  exit();
 } catch(PDOException $e){
     echo "Error: ".$e->getMessage();
 }
 

}
