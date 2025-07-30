<?php
require('../inc/db_config.php');
require('../inc/essentials.php');

$res = mysqli_query($con, "SELECT * FROM events");
$events = [];

while ($row = mysqli_fetch_assoc($res)) {
    $events[] = $row;
}

echo json_encode($events);
?>
