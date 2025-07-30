<?php
session_start();
require('fpdf/fpdf.php');
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');

// Conectar a la base de datos
$hname ='localhost';
$uname= 'root';
$pass = '';
$db='hbwebsite';

$con = mysqli_connect($hname, $uname, $pass, $db);

if(!$con){
    die("Cannot connect to database: " . mysqli_connect_error());
}

// Función para obtener el nombre de la habitación por ID


// Función para insertar reserva en la base de datos
function insertarReserva($check_in, $check_out, $room_id, $user_id, $conn) {
    // Preparar y ejecutar consulta SQL para insertar reserva
    $sql = "INSERT INTO booking_order (check_in, check_out, room_id, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $check_in, $check_out, $room_id, $user_id);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        $stmt->close();
        return false;
    }
}

// Procesar formulario de reserva
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $room_id = $_POST['roomtype']; // El ID de la habitación seleccionada
    $user_id = $_SESSION['id']; // ID del usuario actualmente autenticado

    // Obtener el nombre de la habitación seleccionada
    $room_name = obtenerNombreHabitacion($room_id, $con);

    // Insertar reserva en la base de datos
    if (insertarReserva($check_in, $check_out, $room_id, $user_id, $con)) {
        // Generar el PDF con la confirmación de reserva
        class PDF extends FPDF {
            function Header() {
                $this->SetFont('Arial', 'B', 12);
                $this->Cell(0, 10, 'HOTELES Veranum', 0, 1, 'C');
                $this->SetFont('Arial', '', 10);
                $this->Cell(0, 5, '----------------------------------------------------------', 0, 1, 'C'); // Separador
            }

            function Footer() {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
            }
        }

        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Booking made successfully!', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Fecha de Check-in: ' . $check_in, 0, 1, 'C');
        $pdf->Cell(0, 10, "Fecha de Check-out: " . $check_out, 0, 1, 'C');
        $pdf->Cell(0, 10, "Room selected: " . $room_name, 0, 1, 'C'); // Mostrar el nombre de la habitación

        // Nombre del archivo PDF que se descargará
        $nombreArchivo = 'reserva_' . date('Y-m-d_H-i-s') . '.pdf';

        // Forzar la descarga del PDF con el mensaje
        $pdf->Output('D', $nombreArchivo);

        // Redireccionar o mostrar mensaje de éxito
        // header('Location: confirmacion.php'); // Redirigir a otra página de confirmación si es necesario
        exit;
    } else {
        echo "Error al procesar la reserva. Por favor, inténtalo de nuevo.";
    }
}
?>
