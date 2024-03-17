<?php
session_start();
require '../configurations/conection.php';
//VARIAVEL QUE FOI ENVIADA PELO FORMULARIO
if(isset($_POST['delete'])) {
    $id = $_POST['id']; //ENVIADA PELO FORMULARIO
    $nome = $_POST['user'];
    $sql = "DELETE FROM produtos WHERE idprodutos = :id";
    $resultado = $conn->prepare($sql);
    $resultado->bindValue(":id", $id);
    if($resultado->execute()) {
        header("Location: ../view/listarProdutos.php?msgSucessCad=feit");
        exit();
    } else {
        header("Location: index.php?msg=error");
        exit();
    }
}