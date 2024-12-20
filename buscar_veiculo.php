<?php
include('config.php');

$id = $_GET['id'];
$query = "SELECT modelo FROM veiculo WHERE placa = $id";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(['modelo' => $row['modelo']]);
} else {
    echo json_encode(['modelo' => '']);
}
?>
