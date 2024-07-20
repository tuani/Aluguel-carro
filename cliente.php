<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Cadastro de Cliente</title>
    <?php include('config.php'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        .form-container h1 {
            color: #333;
        }
        .input-group {
            margin: 20px 0;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #003366; 
        }
        .input-group input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .input-group input[type="submit"] {
            background-color: #003366; 
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        .input-group input[type="submit"]:hover {
            background-color: #002244; 
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #003366; 
            text-decoration: none;
            font-size: 16px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Cadastro de Cliente</h1>
        <form action="cliente.php" method="post" name="cliente">
            <div class="input-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome">
            </div>
            <div class="input-group">
                <input type="submit" value="Gravar" name="botao">
            </div>
        </form>
        <a href="index.html">Home</a>

        <?php
        if (@$_POST['botao'] == "Gravar") {
            $nome = $_POST['nome'];
            $insere = "INSERT INTO cliente (nome) VALUES ('$nome')";
            if (mysqli_query($mysqli, $insere)) {
                echo "<div class='message success'>Cliente adicionado com sucesso!</div>";
            } else {
                echo "<div class='message error'>Erro ao adicionar o cliente: " . mysqli_error($mysqli) . "</div>";
            }
        }
        ?>
    </div>
</body>
</html>
