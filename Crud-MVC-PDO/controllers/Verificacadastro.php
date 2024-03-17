<?php
session_start(); // Inicie a sessão se ainda não estiver iniciada

if(isset($_POST['submit'])){
    if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $_SESSION['user'] = $user; // Armazene o valor de $user na sessão
        $_SESSION['senha'] = $pass; // Armazene o valor de $user na sessão
        echo $user;
        echo $pass;
        header("Location:../model/cadastra.php");
    }   
} else {
    header("Location:../view/login.php?msg");
}
?>
