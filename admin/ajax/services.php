<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['add_services'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "INSERT INTO services (name, description) VALUES ('$name', '$description')";
    $result = mysqli_query($con, $query);

    echo $result ? '1' : '0';
}

if (isset($_POST['get_all_services'])) {
    $res = mysqli_query($con, "SELECT * FROM services");
    $i = 1;

    $data = "";

    while ($row = mysqli_fetch_assoc($res)) {
        $data .= "
            <tr>
                <td>$i</td>
                <td>$row[name]</td>
                <td>$row[description]</td>
                <td>
                    <button onclick='edit_details($row[id])' class='btn btn-primary btn-sm shadow-none'>Edit</button>
                    <button onclick='remove_services($row[id])' class='btn btn-danger btn-sm shadow-none'>Delete</button>
                </td>
            </tr>
        ";
        $i++;
    }

    echo $data;
}

if (isset($_POST['remove_services'])) {
    $id = $_POST['services_id'];

    $query = "DELETE FROM services WHERE id=$id";
    $result = mysqli_query($con, $query);

    echo $result ? '1' : '0';
}

if (isset($_POST['get_services'])) {
    $id = $_POST['services_id'];

    $res = mysqli_query($con, "SELECT * FROM services WHERE id=$id");
    $servicesdata = mysqli_fetch_assoc($res);

    echo json_encode(['servicesdata' => $servicesdata]);
}

if (isset($_POST['edit_services'])) {
    $id = $_POST['services_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "UPDATE services SET name='$name', description='$description' WHERE id=$id";
    $result = mysqli_query($con, $query);

    echo $result ? '1' : '0';
}
?>
