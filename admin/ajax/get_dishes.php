<?php
require('../inc/db_config.php');
require('../inc/essentials.php');

// Aquí puedes añadir la lógica para verificar la sesión del administrador si es necesario

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $dishes = array(); // Arreglo para almacenar los platillos

    $query = "SELECT * FROM dishes"; // Asegúrate de que el nombre de la tabla sea correcto

    $result = mysqli_query($con, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dishes[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'price' => $row['price'],
                'image' => $row['image'] // Ajusta la ruta según la estructura de tu proyecto
                // Asegúrate de agregar cualquier otro campo necesario
            );
        }
        mysqli_free_result($result);
    } else {
        die("Error fetching dishes: " . mysqli_error($con));
    }

    // Devolver los platillos como JSON
    echo json_encode($dishes);
} else {
    http_response_code(405); // Método no permitido
}

?>
