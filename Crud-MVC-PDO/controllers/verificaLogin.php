<?php 
session_start();
if(isset($_POST['submit'])){
    if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        echo $_SESSION['user'];
        echo $_SESSION['pass'];
        header("Location:../model/logar.php");
        
    }else{
        header("Location:../view/login.php?msgErrorCad=erroC");
    }
}
?>