<?php

require "../connection/conection.php";
include "../class/usuarioDAO.class.php";


$userDao = new UsuarioDAO($pdo);


if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['dinheiro'])){
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $email =  filter_var($email, FILTER_VALIDATE_EMAIL);
    $dinheiro = htmlspecialchars($_POST['dinheiro']);
  


if($userDao->findByEmail($email) === false) {
    $createNewUser = new User();
    $createNewUser->setNome($nome);
    $createNewUser->setEmail($email);
    $createNewUser->setDinheiro( $dinheiro);
    $userDao->create($createNewUser);
      header("location: ../index.php");

} else{
    echo "Email já cadastrado";
}


}

