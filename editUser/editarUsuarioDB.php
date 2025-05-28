<?php
include '../connection/conection.php';
include "../class/usuarioDAO.class.php";
$userDao = new UsuarioDAO($pdo);


if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['dinheiro'])){
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $email =  filter_var($email, FILTER_VALIDATE_EMAIL);
    $dinheiro = htmlspecialchars($_POST['dinheiro']);
    $idGet = $_POST['id'];


 if(isset($idGet) && isset($nome) && isset($email) && isset($dinheiro)){
      $userUpdate = new User();
      $userUpdate->setId($idGet);
      $userUpdate->setNome($nome);
      $userUpdate->setEmail($email);
      $userUpdate->setDinheiro($dinheiro);
      $userDao->update($userUpdate);

      header("Location: ../index.php");
       exit();
      
    }
 

}



?>