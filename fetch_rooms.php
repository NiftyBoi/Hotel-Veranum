<?php
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

// Conexión a la base de datos
$conn = new mysqli($hname, $uname, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name FROM rooms WHERE status = 1";
$result = $conn->query($sql);

$rooms = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }
}

echo json_encode($rooms);

$conn->close();
?>
