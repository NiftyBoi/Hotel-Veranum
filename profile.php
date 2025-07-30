<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    
    <?php 
    require('inc/header.php'); 
    require_once('admin/inc/db_config.php');

    // Verificar sesión
    if(!(isset($_SESSION['userLogin']) &&  $_SESSION['userLogin']==true)){
        redirect('index.php');
    }
    
    // Obtener datos del usuario desde la base de datos
    $u_exist = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1",[$_SESSION['id']], 's');

    if(mysqli_num_rows($u_exist)==0){
        redirect('index.php');
    }
    $u_fetch = mysqli_fetch_assoc($u_exist);

    // Procesar el formulario cuando se envíe
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_POST['name']) ? $_POST['name'] : $u_fetch['name'];
        $email = $u_fetch['email']; // No se permite modificar el correo electrónico
        $phonenum = isset($_POST['phonenum']) ? $_POST['phonenum'] : $u_fetch['phonenum'];
        $adress = isset($_POST['adress']) ? $_POST['adress'] : $u_fetch['adress'];
        $pincode = isset($_POST['pincode']) ? $_POST['pincode'] : $u_fetch['pincode'];
        $dob = isset($_POST['dob']) ? $_POST['dob'] : $u_fetch['dob'];

        // Actualizar los datos del usuario en la base de datos
        $sql = "UPDATE `user_cred` SET `name`=?, `phonenum`=?, `adress`=?, `pincode`=?, `dob`=? WHERE `id`=?";
        $params = [$name, $phonenum, $adress, $pincode, $dob, $_SESSION['id']];
        $result = update($sql, $params, 'ssssss');

        if ($result) {
            echo '<div class="alert alert-success" role="alert">Datos actualizados correctamente.</div>';
            // Actualizar los datos del usuario en la sesión si es necesario
            $_SESSION['username'] = $name;
            // Actualizar $u_fetch para mostrar los datos actualizados después de guardar
            $u_fetch = [
                'name' => $name,
                'email' => $email,
                'phonenum' => $phonenum,
                'adress' => $adress,
                'pincode' => $pincode,
                'dob' => $dob
            ];
        } else {
            echo '<div class="alert alert-danger" role="alert">Error al actualizar los datos. Por favor, inténtalo de nuevo.</div>';
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 px-4">
                <h2 class="fw-bold">PROFILE</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
                    <span class="text-secondary"> > </span>
                    <a href="#" class="text-secondary text-decoration-none">PROFILE</a>
                </div>
            </div>

            <div class="col-12 mb-5 px-4">
                <div class="bg-white p-3 p-md-4 rounded shadow-sm">
                    <form method="POST" action="profile.php">
                        <h5 class="mb-3 fw-bold">Información básica</h5>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Nombre</label>
                                <input name="name" type="text" value="<?php echo isset($_POST['name']) ? $_POST['name'] : $u_fetch['name'] ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Correo electrónico</label>
                                <input name="email" type="email" value="<?php echo $u_fetch['email'] ?>" class="form-control shadow-none" disabled>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Número</label>
                                <input name="phonenum" type="number" value="<?php echo isset($_POST['phonenum']) ? $_POST['phonenum'] : $u_fetch['phonenum'] ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Dirección</label>
                                <textarea name="adress" class="form-control shadow-none" rows="1" required><?php echo isset($_POST['adress']) ? $_POST['adress'] : $u_fetch['adress'] ?></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Número de Documento</label>
                                <input name="pincode" type="number" value="<?php echo isset($_POST['pincode']) ? $_POST['pincode'] : $u_fetch['pincode'] ?>" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Fecha de Nacimiento</label>
                                <input name="dob" type="date" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : $u_fetch['dob'] ?>" class="form-control shadow-none" required max="2006-12-31">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark shadow-none">Guardar</button>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>



</body>
</html>
