<?php 
include 'conection.php';

$valuesToEdit = [];

$id = filter_input(INPUT_GET,'id');

if($id){
    $stmtEdit = $pdo->prepare("SELECT * FROM dados WHERE id = :id");
    $stmtEdit->bindValue(":id",$id);
    $stmtEdit->execute();
    $valuesToEdit = $stmtEdit->fetch(PDO::FETCH_ASSOC);
    

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


    <input type="hidden" name="id" placeholder="id" value="<?= $valuesToEdit['id'] ?>">
    <input type="text" name="nome" placeholder="Mudar nome" value="<?= $valuesToEdit['nome'] ?>">
    <br>
    <br>
    <input type="text" name="email" placeholder="Mudar Email" value="<?= $valuesToEdit['email'] ?>">
    <br>
    <br>
    <input type="text" name="dinheiro" placeholder="Mudar Dinheiro" value="<?= $valuesToEdit['dinheiro'] ?>">
    <br>
    <br>
    <input type="submit" value="Adicionar">


    </form>
    
</body>
</html>