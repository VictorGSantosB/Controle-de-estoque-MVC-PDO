<?php
session_start();
require '../configurations/conection.php';


    if(isset($_POST['adicionar'])) {
        $nomeProduto = $_POST['nome'];
        $quantidadeProduto = $_POST['quantidade'];
        $precoProduto = $_POST['preco'];
    
        // Validar os campos do formulário
        if (!empty($nomeProduto) && !empty($quantidadeProduto) && !empty($precoProduto)) {
            // Preparar e executar a consulta SQL com prepared statements
            $sql = "INSERT INTO produtos (nome, quantidade, preco) VALUES (:nome, :quantidade, :preco)";
            $resultado = $conn->prepare($sql);
            $resultado->bindValue(":nome", $nomeProduto);
            $resultado->bindValue(":quantidade", $quantidadeProduto);
            $resultado->bindValue(":preco", $precoProduto);
    
            if ($resultado->execute()) {
                // Redirecionar com mensagem de sucesso
                header("Location: ../view/listarProdutos.php?msgSucessCadS=feito");
                exit(); // Termina o script após o redirecionamento
            } else {
                // Se a execução da consulta falhar, redirecionar com mensagem de erro
                header("Location: ../view/listarProdutos.php?msgError=Erro ao adicionar o produto");
                exit(); // Termina o script após o redirecionamento
            }
        } else {
            // Se algum campo estiver vazio, redirecionar com mensagem de erro
            header("Location: ../view/listarProdutos.php?msgError=Preencha todos os campos");
            exit(); // Termina o script após o redirecionamento
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Estilizado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="#" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" id="preco" name="preco" step="0.01" required>
            </div>
            <input type="submit" name="adicionar" value="Enviar">
        </form>
    </div>
</body>

</html>