<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERANUM</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        
        .availability-form{
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }
        @media screen and (max-width: 575px){
            .availability-form{
            margin-top: 25px;
            padding: 0 35px;
        }
        }

    </style>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <!--CARRUSEL-->
    <div class="container-fluid px-lg-4 mt-4 ">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="images/carousel/1.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/2.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/3.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="images/carousel/4.png" class="w-100 d-block" />
                </div>
            </div>
        </div>
    </div>

    <!--Componente de disponibilidad-->
    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Revisa la disponibilidad</h5>
                <form>
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none">
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Adultos</label>
                            <select class="form-select shadow-none">
                                <option selected>Abre para seleccionar</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Nuestros habitaciones-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">NUESTRAS HABITACIONES</h2>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/rooms/2.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Habitación simple</h5>
                        <h6 class="mb-4">$50000 por noche</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Especificaciones</h6>
                            <p class="card-text">Habitación tipo carcel. Posee todos los lujos de una cárcel (ninguno) </p>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">no baño</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">no desayuno</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">no servicio a la habitación</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserva</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Más detalles</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/rooms/3.png" class="card-img-top">
                    <div class="card-body">
                        <h5>Habitación oscura</h5>
                        <h6 class="mb-4">$100000 por noche</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Especificaciones</h6>
                            <p class="card-text">Habitación con ataúd, para un sueño reparador </p>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 ataúd</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 baño</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">cortinas blackout</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserva</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Más detalles</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="images/rooms/1.jpg" class="card-img-top">
                    <div class="card-body">
                        <h5>Habitación Simple</h5>
                        <h6 class="mb-4">$70.000 por noche</h6>
                        <div class="features mb-4">
                            <h6 class="mb-1">Especificaciones</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">2 rooms</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 baño</span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap lh-base">1 cocina</span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Reserva</a>
                            <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Más detalles</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">NUESTROS HOTELES POSEEN</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/facilities/wifi.svg" width="80px">
                <h5 class="mt-3">wifi</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/facilities/fuego.svg" width="80px">
                <h5 class="mt-3">fuego</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/facilities/spa.svg" width="80px">
                <h5 class="mt-3">spa</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/facilities/calef.svg" width="80px">
                <h5 class="mt-3">calefaccion</h5>
            </div>
            <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                <img src="images/facilities/tele.svg" width="80px">
                <h5 class="mt-3">tele</h5>
            </div>
        </div>
    </div>

<!-- REACH US-->
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">¡Encuentranos!</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                    <iframe class="w-100 rounded"height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25321.00904576202!2d-72.66577075!3d-37.50494319999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966a28deed79832b%3A0x27666816b375fa00!2zTmFjaW1pZW50bywgQsOtbyBCw61v!5e0!3m2!1ses!2scl!4v1719440456679!5m2!1ses!2scl"   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="bg-white ph-4 rounded mb-4">
                        <h5>Llámanos</h5>
                        <a href="telefono: +56966666666" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> +56966666666
                        </a>
                        <br>
                        <a href="telefono: +56966666666" class="d-inline-block text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> +56966666666
                        </a>
                        <h5 class="mt-4 ">Email</h5>
                        <a href="mail@XD.com" class="d-inline-block text-decoration-none text-dark">XDDDD@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>

    <?php require('inc/footer.php'); ?>

<br><br><br>
<br><br><br>


    <script>
        var swiper = new Swiper('.swiper-container', {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>
</html>
