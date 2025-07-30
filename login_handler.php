<!-- login_handler.php -->

<?php
session_start();
require_once('admin/inc/db_config.php');

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Realizar la validación de las credenciales (reemplaza con tu lógica de validación)
    $query = "SELECT * FROM `user_cred` WHERE `email`= ? AND `password`=?";
    $values = [$email, $password];
    $res = select($query, $values, "ss");

    if ($res && $res->num_rows == 1) {
        // Iniciar sesión y redirigir al usuario a la página deseada
        $row = mysqli_fetch_assoc($res);
        $_SESSION['userLogin'] = true;
        $_SESSION['id'] = $row['id'];
        header('Location: index.php'); // Cambia a la página a la que quieres redirigir después de iniciar sesión
        exit();
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        $_SESSION['loginError'] = 'Credenciales incorrectas. Por favor, intenta de nuevo.';
        header('Location: login.php'); // Redirigir de nuevo al formulario de inicio de sesión
        exit();
    }
} else {
    // Si no se envían datos POST, redirigir al formulario de inicio de sesión
    header('Location: login.php');
    exit();
}
?>
