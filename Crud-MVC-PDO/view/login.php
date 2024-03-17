<?php
if (isset($_GET['msgSucessCad'])) {
    if ($_GET['msgSucessCad'] === 'oukei') {
        echo "<div class='sucess-message'>";
        echo "<p>Usuario cadastrado com sucesso.</p>";
        echo "</div>";
        echo "<script>
                 setTimeout(function(){
                    document.querySelector('.sucess-message').remove();
                 }, 3000); // Tempo em milissegundos (3 segundos)
               </script>";
    }
}
if (isset($_GET['msgErrorCad'])) {
    if ($_GET['msgErrorCad'] === 'erroC') {
        echo "<div class='error-message'>";
        echo "<p>Coloque todas suas credenciais.</p>";
        echo "</div>";
        echo "<script>
                 setTimeout(function(){
                    document.querySelector('.error-message').remove();
                 }, 3000); // Tempo em milissegundos (3 segundos)
               </script>";
    }
}
if (isset($_GET['msgErrorLog'])) {
    if ($_GET['msgErrorLog'] === 'erroL') {
        echo "<div class='error-message'>";
        echo "<p>Usuario ou senha incorretos.</p>";
        echo "</div>";
        echo "<script>
                 setTimeout(function(){
                    document.querySelector('.error-message').remove();
                 }, 3000); // Tempo em milissegundos (3 segundos)
               </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, cyan, yellow);
        }

        #div {
            margin-top: 40px;
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }

        .sucess-message {
            background-color: greenyellow;
            color: #000;
            padding: 5px;
            border: 1px solid green;
            border-radius: 5px;
            width: 300px;
            margin: 0 auto;
            text-align: center;
            margin-top: 30px;
        }

        .error-message {
            background-color: #ffcccc;
            color: #cc0000;
            padding: 5px;
            border: 1px solid #cc0000;
            border-radius: 5px;
            width: 300px;
            margin: 0 auto;
            text-align: center;
            margin-top: 30px;
        }

        input {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }

        #button {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;

        }

        #button:hover {
            background-color: deepskyblue;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div id="div">
        <form method="post" action="../controllers/verificaLogin.php">
            <h1>Login</h1>
            <input type="text" name="user" placeholder="Nome">
            <br><br>
            <input type="password" name="pass" placeholder="Senha">
            <br><br>
            <input id="button" type="submit" value="Entrar" name="submit">
        </form>

    </div>
</body>

</html>