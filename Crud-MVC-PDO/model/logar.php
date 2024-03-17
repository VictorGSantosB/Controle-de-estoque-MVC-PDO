<?php 
session_start();
require '../configurations/conection.php';
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    
} else {
    echo "Erro: Usuário não definido na sessão.";
    header("Location:../view/painelCadastro.php");
    exit();
}
// echo $_SESSION['user'];
// echo $_SESSION['pass'];
$sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
$resultado = $conn->prepare($sql);
$resultado->bindValue(":login",$user);
$resultado->bindValue(":senha",$pass);
$resultado->execute();
if($resultado->rowCount() > 0){
    $dado = $resultado->fetch();
    $_SESSION['id'] = $dado['idusuarios'];
    $_SESSION['login'] = $dado['login'];
    echo $_SESSION['id'];
    echo $_SESSION['login'];
    header("Location:../index.php");
}else{
    header("Location:../view/login.php?msgErrorLog=erroL");
    exit();
}