<?php
include "../connection/conection.php";
include "../class/usuarioDAO.class.php";
$userDao = new UsuarioDAO($pdo);

$idGet = $_GET['id'];

if($idGet){
$userDelete = $userDao->delete($idGet);
}
header('Location: ../index.php');
exit();



?>


