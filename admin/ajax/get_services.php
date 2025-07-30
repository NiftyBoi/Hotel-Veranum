<?php
require('../inc/db_config.php');
require('../inc/essentials.php');

$res = mysqli_query($con, "SELECT * FROM services");
$services = [];

while ($row = mysqli_fetch_assoc($res)) {
    $services[] = $row;
}

echo json_encode($services);
?>
