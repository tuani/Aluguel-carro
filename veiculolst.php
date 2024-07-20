<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Relatório de compras</title>
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
        max-width: 700px;
        text-align: center;
    }
    .form-container h1 {
        color: #333;
    }
    .input-group {
        margin: 20px 0;
    }
    .input-group input[type="submit"] {
        background-color: #003366; 
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    .input-group input[type="submit"]:hover {
        background-color: #002244; 
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 17px;
    }
    th {
        background-color: #003366; 
        color: white;
        border-right: 1px solid white; 
    }
    th:last-child {
        border-right: none; 
    }
    tr:nth-child(even) {
        background-color: #ddd; 
    }
    tr:nth-child(odd) {
        background-color: white; 
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
    <h1>Relatório de Aluguel</h1>
    <form action="veiculolst.php?botao=gravar" method="post" name="form1">
        <div class="input-group">
            <input type="submit" name="botao" value="Gerar">
        </div>
    </form>

    <?php if (isset($_POST['botao']) && $_POST['botao'] == "Gerar") { ?>
        <table>
            <thead>
            <tr style="background-color: #; color: white;">
                <th width="15%" style="padding: 15px;">Nome Cliente</th>
                <th width="15%" style="padding: 15px;">Modelo Veículo</th>
                <th width="15%" style="padding: 15px;">Data Locação</th>               
            </tr>
            </thead>
            <tbody>
            <?php

            $query = "SELECT cliente.nome, veiculo.modelo, aluga.data
                      FROM cliente 
                      INNER JOIN aluga ON cliente.codigo = aluga.codigo
                      INNER JOIN veiculo ON aluga.placa = veiculo.placa";
            $query .= " ORDER BY aluga.data";
            $result = mysqli_query($mysqli, $query);

            while ($coluna = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $coluna['nome']; ?></td>
                    <td><?php echo $coluna['modelo']; ?></td>
                    <td><?php echo $coluna['data']; ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    <a href="index.html">Home</a>
</div>
</body>
</html>