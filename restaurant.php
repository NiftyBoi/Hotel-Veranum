<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL - RESTAURANTE</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .img-container {
            padding-left: 15px;
        }
        .card-img {
            max-height: 200px; /* Altura máxima deseada para las imágenes */
            width: 100%; /* Ajustar ancho al 100% */
            object-fit: cover; /* Cubrir el contenido del tamaño de la imagen */
            border-radius: 10px; /* Redondear esquinas */
        }
        .card {
            height: 100%;
        }
    </style>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">NUESTRO RESTAURANTE</h2>
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
                                <h5 class="mb-3" style="font-size:18px;">Categorías</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="c1" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="c1">Entradas</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="c2" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="c2">Platos Principales</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="c3" class="form-check-input shadow-none me-1">
                                    <label class="form-label" for="c3">Postres</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="row" id="dishes-container">
                    <!-- Aquí se cargarán los platillos -->
                </div> <!-- /.row -->
            </div> <!-- /.col-lg-9 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

    <?php require('inc/footer.php'); ?>

    <?php require('inc/scripts.php'); ?>

    <script>
        function fetchDishes() {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "admin/ajax/get_dishes.php", true);
            xhr.onload = function() {
                if (this.status === 200) {
                    let dishes = JSON.parse(this.responseText);
                    let dishesContainer = document.getElementById('dishes-container');
                    dishesContainer.innerHTML = '';

                    dishes.forEach(dish => {
                        let dishCard = `
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 shadow h-100">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-4">
                                            <div class="img-container p-3">
                                                <img src="images/restaurant/${dish.image}" class="card-img img-fluid rounded">
                                            </div>
                                        </div>
                                        <div class="col-md-8">  
                                            <div class="card-body">
                                                <h5 class="card-title">${dish.name}</h5>
                                                <p class="card-text">${dish.description}</p>
                                                <p class="card-text"><small class="text-muted">$${dish.price}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        dishesContainer.insertAdjacentHTML('beforeend', dishCard);
                    });
                } else {
                    console.error('Error fetching dishes:', this.status);
                }
            };
            xhr.send();
        }

        window.onload = function() {
            fetchDishes();
        };
    </script>
</body>
</html>
