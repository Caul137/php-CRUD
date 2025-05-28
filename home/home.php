<?php
include "./connection/conection.php";
include "./class/usuarioDAO.class.php";

$userDao = new UsuarioDAO($pdo);
$stmtFindAll = $userDao->findAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    

      <table class="style">

    <td>
     <h3>CRUD</h3>
      <a href="./createUser/adicionarUsuario.php" style="text-decoration: none;">Adicionar um novo usuário</a>
    </td>

     <tr>
        <td>Id</td>
        <td>Nome</td>
        <td>Email</td>
        <td>Dinheiro</td>
        <td>Gerenciar</td>
     </tr>

       <?php foreach($stmtFindAll as $dados) : ?>
            <tr> 
                <td><?= $dados->getId() ?></td>
                <td><?= $dados->getNome() ?></td>
                <td><?= $dados->getEmail() ?></td>
                <td><?= $dados->getDinheiro() ?></td>
                <td style="display: flex; gap: 20px"; ><a href="./editUser/editarUsuario.php?id=<?= $dados->getId() ?>">Editar</a>  <a href="./deleteUser/excluirUsuario.php?id=<?= $dados->getId() ?>"> Excluir</a>  </td>
            </tr>
       <?php endforeach; ?>

      </table>

</body>
</html>