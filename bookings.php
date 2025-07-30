<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERANUM - Reservas</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">RESERVA TU ESTADÍA</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, doloremque.
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <form action="booking_handler.php" method="POST" class="p-4 shadow bg-white">
                    <h4 class="mb-3">Detalles</h4>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="check_in" class="form-label">Check-in</label>
                            <input type="date" id="check_in" name="check_in" class="form-control shadow-none" required>
                        </div>
                        <div class="col-md-6">
                            <label for="check_out" class="form-label">Check-out</label>
                            <input type="date" id="check_out" name="check_out" class="form-control shadow-none" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="roomtype" class="form-label">Habitación</label>
                            <select id="roomtype" name="roomtype" class="form-select shadow-none" required>
                                <!-- Las opciones serán cargadas mediante AJAX -->
                            </select>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark">Reservar</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="bg-white p-4 shadow mb-4">
                    <h4 class="mb-3">Información de contacto</h4>
                    <p>Dirección: Nacimiento calle única 123</p>
                    <p>Teléfono: +29384293847923874923874928</p>
                    <p>Email: contacto@veranum.com</p>
                </div>
                <div class="bg-white p-4 shadow">
                    <h4 class="mb-3">Términos y Condiciones</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis, similique. Animi corporis, esse non consequuntur pariatur dolor dicta soluta ipsa.</p>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

    <script>
        $(document).ready(function(){
            $.ajax({
                url: 'fetch_rooms.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var options = '';
                    data.forEach(function(room) {
                        options += '<option value="'+room.id+'">'+room.name+'</option>';
                    });
                    $('#roomtype').html(options);
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar las habitaciones:", error);
                }
            });
        });
    </script>

</body>
</html>
