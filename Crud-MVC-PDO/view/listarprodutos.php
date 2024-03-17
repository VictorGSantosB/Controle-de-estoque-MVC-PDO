<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            font-size: 16px;
            border-collapse: collapse;
            border: 2px solid #dee2e6;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }

        th {
            background-color: #343a40;
            color: #fff;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e2e6ea;
        }

        .btn-delete,
        .btn-edit {
            padding: 6px 12px;
            border: none;
            background-color: #dc3545;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-delete:hover,
        .btn-edit:hover {
            background-color: #c82333;
        }

        .botao {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            /* Azul padrão do Bootstrap */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .botao:hover {
            background-color: #0056b3;
            /* Azul mais escuro no hover */
        }
    </style>
</head>

<body>
    <a href="../index.php" class="botao">Voltar</a>
    <div class="container">
        <form action="../controllers/adicionaProd.php" method="post">
            <input type="hidden" name="id" value="<?php $usuario['idprodutos'] ?>">
            <input type="hidden" name="user" value="<?php $usuario['nome'] ?>">
            <button type="submit" name="submit" class="btn-edit">+</button>
        </form>
        <?php
        require '../configurations/conection.php';
        $sql = "SELECT * FROM produtos";
        $resultado = $conn->prepare($sql);
        $resultado->execute();
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        
        if (isset($_GET['msgSucessCadS']) && $_GET['msgSucessCadS'] === 'feito') {
            echo "<div class='success-message'>";
            echo "<p>Produto cadastrado com sucesso.</p>";
            echo "<span class='close' onclick='this.parentElement.style.display=\"none\";'>&times;</span>";
            echo "</div>";
        }
        if (isset($_GET['msgSucessCad']) && $_GET['msgSucessCad'] === 'feit') {
            echo "<div class='success-message'>";
            echo "<p>Produto deletado com sucesso.</p>";
            echo "<span class='close' onclick='this.parentElement.style.display=\"none\";'>&times;</span>";
            echo "</div>";
        }
        ?>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produtos</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                <?php
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>" . $usuario['idprodutos'] . "</td>";
                    echo "<td>" . $usuario['nome'] . "</td>";
                    echo "<td>" . $usuario['quantidade'] . "</td>";
                    echo "<td>R$" . number_format($usuario['preco'], 2, ',', '.') . "</td>";
                    echo '<td>
                            <form action="../controllers/delete.php" method="post">
                                <input type="hidden" name="id" value="' . $usuario['idprodutos'] . '">
                                <button type="submit" name="delete" class="btn-delete">Delete</button>
                            </form>
                          </td>';
                    echo '<td>
                            <form action="../controllers/edit.php" method="post">
                                <input type="hidden" name="id" value="' . $usuario['idprodutos'] . '">
                                <input type="hidden" name="user" value="' . $usuario['nome'] . '">
                                <input type="hidden" name="quantidade" value="' . $usuario['quantidade'] . '">
                                <input type="hidden" name="preco" value="' . $usuario['preco'] . '">
                                <button type="submit" name="edit" class="btn-edit">Edit</button>
                            </form>
                          </td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

</body>

</html>