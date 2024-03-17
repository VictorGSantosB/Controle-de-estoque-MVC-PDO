<?php 
session_start();
require '../configurations/conection.php';
echo $_POST['preco'];
if(isset($_POST['submit'])){ // Verifiqua se o formulário foi enviado
    if(isset($_POST['id'])){ // Verifiqua se todos os campos estão presentes
        $id = $_POST['id'];
        $nameProd = $_POST['name'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $sql = "UPDATE produtos SET nome = :nome, preco = :preco,quantidade = :quantidade WHERE idprodutos = :id";
        $resultado = $conn->prepare($sql);
        $resultado->bindValue(":nome", $nameProd); 
        $resultado->bindValue(":preco", $preco);
        $resultado->bindValue(":quantidade", $quantidade);
        $resultado->bindValue(":id", $id); 
        if($resultado->execute()){
            echo "Cliente atualizado com sucesso";
            // header("Location:index.php?msgEdit=editado");
        }else{
            echo "Erro ao atualizar o cliente";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
<body>
<div class="container">
        <h2>Editando Produto com ID <?php echo $_POST['id']; ?></h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="<?php echo $_POST['user']; ?>">
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" value="<?php echo $_POST['preco']; ?>">
            <label for="quantidade">Quantidade:</label>
            <input type="text" id="quantidade" name="quantidade" value="<?php echo $_POST['quantidade']; ?>">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>