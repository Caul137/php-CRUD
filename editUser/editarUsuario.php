<?php 
include '../connection/conection.php';
include "../class/usuarioDAO.class.php";
$userDao = new UsuarioDAO($pdo);

$id = filter_input(INPUT_GET,'id');

$userEdit = false;

if($id){
    $userEdit = $userDao->findById($id);
}

if($userEdit === false){
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


 <form action="editarUsuarioDB.php" method="post">


    <input type="hidden" name="id" placeholder="id" value="<?= $userEdit->getId()?>">
    
    <input type="text" name="nome" placeholder="Mudar nome" value="<?= $userEdit->getNome()?>">
    <br>
    <br>
    <input type="text" name="email" placeholder="Mudar Email" value="<?= $userEdit->getEmail() ?>">
    <br>
    <br>
    <input type="text" name="dinheiro" placeholder="Mudar Dinheiro" value="<?= $userEdit->getDinheiro() ?>">
    <br>
    <br>
    <input type="submit" value="Adicionar">


    </form>
    
</body>
</html>