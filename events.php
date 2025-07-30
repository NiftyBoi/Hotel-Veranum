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
        .card-container {
            height: 400px; /* Altura de la tarjeta ajustada */
        }
    </style>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Eventos Activos</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row" id="events-container">
            <!-- Aquí se cargarán los eventos -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->

    <?php require('inc/footer.php'); ?>

    <?php require('inc/scripts.php'); ?>

    <script>
        function fetchEvents() {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "admin/ajax/get_events.php", true);
            xhr.onload = function() {
                if (this.status === 200) {
                    let events = JSON.parse(this.responseText);
                    let eventsContainer = document.getElementById('events-container');
                    eventsContainer.innerHTML = '';

                    events.forEach(event => {
                        let eventCard = `
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 card-container">
                                    <div class="row g-0 align-items-center">
                                        
                                        <div class="col-md-8">  
                                            <div class="card-body">
                                                <h5 class="card-title">${event.name}</h5>
                                                <p class="card-text">${event.description}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        eventsContainer.insertAdjacentHTML('beforeend', eventCard);
                    });
                } else {
                    console.error('Error fetching events:', this.status);
                }
            };
            xhr.send();
        }

        window.onload = function() {
            fetchEvents();
        };
    </script>
</body>
</html>
