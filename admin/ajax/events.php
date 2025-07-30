<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if (isset($_POST['add_event'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "INSERT INTO events (name, description) VALUES ('$name', '$description')";
    $result = mysqli_query($con, $query);

    echo $result ? '1' : '0';
}

if (isset($_POST['get_all_events'])) {
    $res = mysqli_query($con, "SELECT * FROM events");
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
                    <button onclick='remove_event($row[id])' class='btn btn-danger btn-sm shadow-none'>Delete</button>
                </td>
            </tr>
        ";
        $i++;
    }

    echo $data;
}

if (isset($_POST['remove_event'])) {
    $id = $_POST['event_id'];

    $query = "DELETE FROM events WHERE id=$id";
    $result = mysqli_query($con, $query);

    echo $result ? '1' : '0';
}

if (isset($_POST['get_event'])) {
    $id = $_POST['event_id'];

    $res = mysqli_query($con, "SELECT * FROM events WHERE id=$id");
    $eventdata = mysqli_fetch_assoc($res);

    echo json_encode(['eventdata' => $eventdata]);
}

if (isset($_POST['edit_event'])) {
    $id = $_POST['event_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    $query = "UPDATE events SET name='$name', description='$description' WHERE id=$id";
    $result = mysqli_query($con, $query);

    echo $result ? '1' : '0';
}
?>
