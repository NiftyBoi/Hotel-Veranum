<?php
    require('../inc/db_config.php');
    require('../inc/essentials.php');
    adminLogin();

    if (isset($_POST['add_dish'])) {
        $frm_data = filteration($_POST);
        $flag = 0;

        // Función para subir imagen del platillo
        function uploadRestaurantImage($image)
        {
            $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
            $img_mime = $image['type'];

            if (!in_array($img_mime, $valid_mime)) {
                return 'inv_img';
            } else {
                $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
                $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";

                $image_directory = RIGHT_PATH; // Ruta completa hasta la carpeta restaurant/images

                if (!file_exists($image_directory)) {
                    mkdir($image_directory, 0777, true); // Crea el directorio si no existe
                }

                $img_path = $image_directory . $rname;

                if (move_uploaded_file($image['tmp_name'], $img_path)) {
                    return $rname;
                } else {
                    return 'upd_failed';
                }
            }
        }

        // Ejemplo de consulta SQL para insertar un platillo
        $q1 = "INSERT INTO `dishes`(`name`, `price`, `description`, `image`) VALUES (?,?,?,?)";
        $image_name = uploadRestaurantImage($_FILES['image']); // Subir la imagen y obtener el nombre de archivo generado

        if ($image_name !== 'inv_img' && $image_name !== 'upd_failed') {
            $values = [
                $frm_data['name'],
                $frm_data['price'],
                $frm_data['description'],
                $image_name
            ];

            if (insert($q1, $values, 'siss')) {
                $flag = 1;
            } else {
                $flag = 0;
            }
        } else {
            // Manejar errores de carga de imagen aquí
            $flag = 0;
        }

        echo $flag; // Enviar 1 si la inserción fue exitosa, de lo contrario 0
    }

    if (isset($_POST['get_all_dishes'])) {
        $res = selectAll('dishes');
        $i = 1;
        $data = "";

        while ($row = mysqli_fetch_assoc($res)) {
            $data .= "
                <tr class='align-middle'>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[price]</td>
                    <td>$row[description]</td>
                    <td>
                        <button type='button' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-dish' onclick='edit_details($row[id])'>
                            <i class='bi bi-pencil-square'></i>
                        </button>
                        <button type='button' onclick='remove_dish($row[id])' class='btn btn-danger shadow-none btn-sm'>
                            <i class='bi bi-trash'></i>
                        </button>
                    </td>
                </tr>
            ";
            $i++;
        }

        echo $data;
    }


    if (isset($_POST['get_dish'])) {
        $frm_data = filteration($_POST);
        $res1 = select("SELECT * FROM `dishes` WHERE `id`=?", [$frm_data['get_dish']], 'i');

        $dish_data = mysqli_fetch_assoc($res1);
        $data = ["dishdata" => $dish_data];

        echo json_encode($data); // Enviar datos en formato JSON
    }

    if (isset($_POST['edit_dish'])) {
        $frm_data = filteration($_POST);
        $flag = 0;
    
        // Verificar si 'id' está presente en $_POST
        if (isset($frm_data['id'])) {
            // Ejemplo de consulta SQL para actualizar un platillo
            $q = "UPDATE `dishes` SET `name`=?, `price`=?, `description`=? WHERE `id`=?";
            $v = [
                $frm_data['name'],
                $frm_data['price'],
                $frm_data['description'],
                $frm_data['id']
            ];
    
            // Depuración: Imprimir la consulta SQL y los valores de los parámetros
            echo "SQL: $q<br>";
            echo "Params: "; var_dump($v); echo "<br>";
    
            if (update($q, $v, 'sisi')) {
                $flag = 1;
            } else {
                $flag = 0;
            }
        } else {
            // Si 'id' no está presente en $_POST, manejar el error o mostrar un mensaje adecuado
            $flag = 0;
        }
    
        echo "Flag: $flag"; // Enviar 1 si la actualización fue exitosa, de lo contrario 0
    }
    
    

    if (isset($_POST['remove_dish'])) {
        $frm_data = filteration($_POST);

        // Ejemplo de consulta SQL para eliminar un platillo
        $q = "DELETE FROM `dishes` WHERE `id`=?";
        $v = [$frm_data['dish_id']];

        if (delete($q, $v, 'i')) {
            echo 1;
        } else {
            echo 0;
        }
    }
    ?>
