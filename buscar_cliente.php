<?php
include('config.php');

$id = $_GET['id'];
$query = "SELECT nome FROM cliente WHERE codigo = $id";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['nome' => $row['nome']]);
} else {
    echo json_encode(['nome' => '']);
}
?>