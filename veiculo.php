<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Cadastro de veiculo</title>
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
        .input-group input[type="text"],
        .input-group input[type="number"] {
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
        <h1>Cadastro de veiculo</h1>
        <form action="veiculo.php" method="post" name="veiculo">
            <div class="input-group">
                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo">
            </div>
            <div class="input-group">
                <label for="quantidade">Quantidade:</label>
                <input type="number" id="quantidade" name="quantidade">
            </div>
            <div class="input-group">
                <input type="submit" value="Gravar" name="botao" >
            </div>
        </form>
        <a href="index.html">Home</a>

        <?php
        include('config.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $modelo = $_POST['modelo'];
            $quantidade = $_POST['quantidade'];

            $query = "SELECT * FROM veiculo WHERE modelo = '$modelo'";
            $result = mysqli_query($mysqli, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $placa = $row['placa'];
                $novo_quantidade = $row['quantidade'] + $quantidade;

                $query_update = "UPDATE veiculo SET quantidade = $novo_quantidade WHERE placa = $placa";
                if (mysqli_query($mysqli, $query_update)) {
                    echo "<div class='message success'>Estoque atualizado com sucesso!</div>";
                } else {
                    echo "<div class='message error'>Erro ao atualizar o estoque: " . mysqli_error($mysqli) . "</div>";
                }
            } else {
                $insere = "INSERT INTO veiculo (modelo, quantidade) VALUES ('$modelo', '$quantidade')";
                if (mysqli_query($mysqli, $insere)) {
                    echo "<div class='message success'>Veiculo adicionado com sucesso!</div>";
                } else {
                    echo "<div class='message error'>Erro ao adicionar o veiculo: " . mysqli_error($mysqli) . "</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
