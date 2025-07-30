<!-- header.php -->

<?php

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>VERANUM</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">VERANUM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rooms.php">Habitaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="facilities.php">Especificaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="restaurant.php">Restaurant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="events.php">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Acerca</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if (isset($_SESSION['userLogin']) && $_SESSION['userLogin'] == true) { ?>
                        <a href="bookings.php" class="btn btn-outline-dark shadow-none me-lg-2 me-3">Reservas</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <?php echo isset($_SESSION['userName']) ? htmlspecialchars($_SESSION['name']) : 'Usuario'; ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li>
                                    <form action="profile.php" method="POST">
                                        <button type="submit" class="dropdown-item">PERFIL</button>
                                    </form>
                                </li>
                                <li>
                                    <form action="bookings.php" method="POST">
                                        <button type="submit" class="dropdown-item">Reservas</button>
                                    </form>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="logout.php" method="POST">
                                        <button type="submit" class="dropdown-item">Cerrar sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Iniciar sesión
                        </button>
                        <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                            Registrarse
                        </button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login-form" action="login_handler.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="loginEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="login">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register-form" action="register_handler.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-pencil-fill"></i> Registro de Usuario
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base ">
                            Tus datos deben coincidir con tus documentos
                        </span>
                        <div class="container-fluid">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nombre</label>
                                    <input name="name" type="text" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Correo electrónico</label>
                                    <input name="email" type="email" class="form-control shadow-none" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Número</label>
                                    <input name="phonenum" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Foto de Perfil</label>
                                    <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Dirección</label>
                                    <textarea name="adress" class="form-control shadow-none" rows="1" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Número de Documento</label>
                                    <input name="pincode" type="number" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Fecha de Nacimiento</label>
                                    <input name="dob" type="date" class="form-control shadow-none" required max="2006-12-31">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Contraseña</label>
                                    <input name="pass" type="password" class="form-control shadow-none" pattern=".{10,}" required title="La contraseña debe tener al menos 10 caracteres">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Confirmar Contraseña</label>
                                    <input name="cpass" type="password" class="form-control shadow-none" pattern=".{10,}" required title="La contraseña debe tener al menos 10 caracteres">
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">REGISTRARSE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
