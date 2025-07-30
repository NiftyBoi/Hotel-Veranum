<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERANUM - ROOMS</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .img-container {
            padding-left: 15px;
        }
    </style>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">NUESTRAS HABITACIONES</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">    
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filtros</h4>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">DISPONIBILIDAD</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">Especificaciones</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f1">baño</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="f2">balcón</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4 img-container">
                                    <img src="images/rooms/2v.png" class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Habitación tipo carcel</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nihil officia sed, aliquid commodi aperiam?</p>
                                        <div class="features mb-2">
                                            <h6 class="mb-1">Especificaciones</h6>
                                            <span class="badge rounded-pill bg-light text-dark">no baño</span>
                                            <!-- Agrega más especificaciones si es necesario -->
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Detalles</a>
                                            <a href="bookings.php" class="btn btn-dark">Reservar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4 img-container">
                                    <img src="images/rooms/3v.png" class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Habitación ataud</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nihil officia sed, aliquid commodi aperiam?</p>
                                        <div class="features mb-2">
                                            <h6 class="mb-1">Especificaciones</h6>
                                            <span class="badge rounded-pill bg-light text-dark">1 ataúd</span>
                                            <span class="badge rounded-pill bg-light text-dark">1 baño</span>
                                            <span class="badge rounded-pill bg-light text-dark">cortinas blackout</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Detalles</a>
                                            <a href="bookings.php" class="btn btn-dark">Reservar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4 img-container">
                                    <img src="images/rooms/4v.png" class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Liminal Room</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nihil officia sed, aliquid commodi aperiam?</p>
                                        <div class="features mb-2">
                                            <h6 class="mb-1">Especificaciones</h6>
                                            <span class="badge rounded-pill bg-light text-dark">2 rooms</span>
                                            <span class="badge rounded-pill bg-light text-dark">1 baño</span>
                                            <span class="badge rounded-pill bg-light text-dark">1 cocina</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Detalles</a>
                                            <a href="bookings.php" class="btn btn-dark">Reservar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4 img-container">
                                    <img src="images/rooms/5v.png" class="img-fluid rounded">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Sad Room</h5>
                                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nihil officia sed, aliquid commodi aperiam?</p>
                                        <div class="features mb-2">
                                            <h6 class="mb-1">Especificaciones</h6>
                                            <span class="badge rounded-pill bg-light text-dark">1 cama</span>
                                            <span class="badge rounded-pill bg-light text-dark">1 baño</span>
                                            <span class="badge rounded-pill bg-light text-dark">ventana rota</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Detalles</a>
                                            <a href="bookings.php" class="btn btn-dark">Reservar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.col-lg-9 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

    <?php require('inc/footer.php'); ?>

</body>
</html>
