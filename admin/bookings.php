<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Bookings</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">BOOKINGS</h3>
                <div class="card-body">
                    <div class="table-responsive-lg">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Check-in</th>
                                    <th scope="col">Check-out</th>
                                    <th scope="col">Room</th>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="booking-data">
                                <?php
                                require('inc/db_config.php');
                                require('inc/essentials.php');

                                // Conectar a la base de datos
                                $con = mysqli_connect($hname, $uname, $pass, $db);

                                if(!$con){
                                    die("Cannot connect to database: " . mysqli_connect_error());
                                }

                                // Obtener todas las reservas de habitaciones
                                $sql = "SELECT * FROM booking_order";
                                $result = mysqli_query($con, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $room_name = obtenerNombreHabitacion($row['room_id'], $con);
                                        echo '<tr>';
                                        echo '<td>' . $row['room_id'] . '</td>';
                                        echo '<td>' . $row['check_in'] . '</td>';
                                        echo '<td>' . $row['check_out'] . '</td>';
                                        echo '<td>' . $room_name . '</td>';
                                        echo '<td>' . $row['user_id'] . '</td>';
                                        echo '<td><button class="btn btn-danger btn-sm" onclick="remove_booking(' . $row['room_id'] . ')">Delete</button></td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6">No bookings found.</td></tr>';
                                }

                                mysqli_close($con);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>

    <script>
        function remove_booking(booking_id) {
            if (confirm("Are you sure you want to delete this booking?")) {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "admin/ajax/bookings.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (this.status === 200) {
                        if (this.responseText.trim() === '1') {
                            alert('Success: Booking deleted');
                            location.reload(); // Refresh the page after deletion
                        } else {
                            alert('Error: Unable to delete booking');
                        }
                    }
                };

                xhr.send('remove_booking=' + booking_id);
            }
        }
    </script>
</body>
</html>
