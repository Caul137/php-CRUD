<?php
include "conection.php";

$stmtGet = $pdo->query("SELECT * FROM dados");
$dadosArray = [];

if($stmtGet->rowCount() > 0) {
  $dadosArray = $stmtGet->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

      <table class="style">

    <td>
     <h3>CRUD</h3>
      <a href="adicionarUsuario.php" style="text-decoration: none;">Adicionar um novo usuário</a>
    </td>

     <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Dinheiro</td>
        <td>Gerenciar</td>
     </tr>

       <?php foreach($dadosArray as $dados) : ?>
            <tr> 
                <td><?= $dados['id'] ?></td>
                <td><?= $dados['nome'] ?></td>
                <td><?= $dados['email'] ?></td>
                <td><?= $dados['dinheiro'] ?></td>
                <td style="display: flex; gap: 20px"; ><a href="editarUsuario.php?id=<?= $dados['id'] ?>">Editar</a>  <a href="excluirUsuario.php?id=<?= $dados['id'] ?>"> Excluir</a>  </td>
            </tr>
       <?php endforeach; ?>

      </table>

</body>
</html>