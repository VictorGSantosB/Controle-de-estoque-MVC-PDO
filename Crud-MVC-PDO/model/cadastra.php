<?php 
session_start(); // Inicie a sessão se ainda não estiver iniciada
require '../configurations/conection.php';
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $pass = $_SESSION['senha'];
    
    
} else {
    echo "Erro: Usuário não definido na sessão.";
    header("Location:../view/painelCadastro.php");
    exit();
}
$sql = "INSERT INTO usuarios(login,senha) VALUES(:login,:senha)";
$resultado=$conn->prepare($sql);
$resultado->bindValue(":login",$user);
$resultado->bindValue(":senha",$pass);
$resultado->execute();
header("Location:../view/login.php?msgSucessCad=oukei");
// echo $user; 
// echo $pass; 

