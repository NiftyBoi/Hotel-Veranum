<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VERANUM - CONTACT</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center">Contactanos</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        Voluptatum pariatur temporibus esse ratione quaerat,
        odio quis harum corrupti cum officia!
    </p>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4">
                <iframe class="w-100 rounded"height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25321.00904576202!2d-72.66577075!3d-37.50494319999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x966a28deed79832b%3A0x27666816b375fa00!2zTmFjaW1pZW50bywgQsOtbyBCw61v!5e0!3m2!1ses!2scl!4v1719440456679!5m2!1ses!2scl"   allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <H5>Adress</H5>
                <a href="https://goo.gl/maps/T1YM8d4fJsoczstd6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-geo-alt-fill"></i> XYZ NACIMIENTO, XD
                </a>
                <h5 class="mt-4">CALL US</h5>
                        <a href="telefono: +56966666666" class="d-inline-block mb-2 text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> +56966666666
                        </a>
                        <br>
                        <a href="telefono: +56966666666" class="d-inline-block text-decoration-none text-dark">
                            <i class="bi bi-telephone-fill"></i> +56966666666
                        </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-5 px-4">
            <div class="bg-white rounded shadow p-4 ">
                <form>
                    <h5> MANDA MENSAJE</h5>
                    <div class="mt-3">
                    <label class="form-label" style="font-weight: 500;"> Nombre </label>
                    <input type="text" class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                    <label class="form-label" style="font-weight: 500;"> email </label>
                    <input type="email" class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                    <label class="form-label" style="font-weight: 500;"> asunto </label>
                    <input type="text" class="form-control shadow-none">
                    </div>
                    <div class="mt-3">
                    <label class="form-label" style="font-weight: 500;"> mensaje </label>
                    <textarea class="form-control shadow-none" rows="5" style="resize:none;"></textarea>
                    </div>
                    <button type="submit" class="btn text-white custom-bg mt-3">ENVIAR</button>
                </form>
                </div>
            </div>
    </div>
</div>


<?php require('inc/footer.php'); ?>


</body>
</html>
