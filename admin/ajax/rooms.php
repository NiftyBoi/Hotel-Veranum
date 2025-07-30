<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['add_room'])) {
    $frm_data = filteration($_POST);
    $flag = 0;

    $q1 = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `desc`) VALUES (?,?,?,?,?,?,?)";
    $values = [
        $frm_data['name'],
        $frm_data['area'],
        $frm_data['price'],
        $frm_data['quantity'],
        $frm_data['adult'],
        $frm_data['children'],
        $frm_data['desc']
    ];

    if (insert($q1, $values, 'siiiiis')) {
        $flag = 1;
    } else {
        $flag = 0;
    }
    
    echo $flag; // Enviar 1 si la inserción fue exitosa, de lo contrario 0
}

if (isset($_POST['get_all_rooms'])) {
    $res = selectAll('rooms');
    $i = 0;
    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {

        if ($row['status'] == 1) {
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>Active</button>";
        } else {
            $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-warning btn-sm shadow-none'>Inactive</button>";
        }

        $data .= "
            <tr class='align-middle'>
                <td>$i</td>
                <td>$row[name]</td>
                <td>$row[area]</td>
                <td>
                    <span class='badge rounded-pill bg-light text-dark border'>
                        Adult: $row[adult]
                    </span><br>
                    <span class='badge rounded-pill bg-light text-dark border'>
                        Children: $row[children]
                    </span>
                </td>
                <td>$row[price]</td>
                <td>$row[quantity]</td>
                <td>$status</td>
                <td>
                    <button type='button' class='btn btn-primary shadow-none btn-sm' data-bs-toggle='modal' data-bs-target='#edit-room' onclick='edit_details($row[id])'>
                        <i class='bi bi-pencil-square'></i>
                    </button>
                    <button type='button' onclick='remove_room($row[id])' class='btn btn-danger shadow-none btn-sm'>
                        <i class='bi bi-trash'></i>
                    </button>
                </td>
            </tr>
        ";

        $i++;
    }

    echo $data;
}

if (isset($_POST['get_room'])) {
    $frm_data = filteration($_POST);
    $res1 = select("SELECT * FROM `rooms` WHERE `id`=?", [$frm_data['get_room']], 'i');

    $room_data = mysqli_fetch_assoc($res1);
    $data = ["roomdata" => $room_data];

    echo json_encode($data); // Enviar datos en formato JSON
}


if (isset($_POST['toggle_status'])) {
    $frm_data = filteration($_POST);

    $q = "UPDATE `rooms` SET `status`=? WHERE `id`=?";
    $v = [$frm_data['value'], $frm_data['toggle_status']];

    if (update($q, $v, 'ii')) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['remove_room'])) {
    $frm_data = filteration($_POST);

    $q = "DELETE FROM `rooms` WHERE `id`=?";
    $v = [$frm_data['room_id']];

    if (delete($q, $v, 'i')) {
        echo 1;
    } else {
        echo 0;
    }
}
?>
