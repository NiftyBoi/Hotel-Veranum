<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL - SERVICES</title>
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .img-container {
            padding-left: 15px;
        }
        .card-img {
            max-height: 200px;
            width: 100%;
            object-fit: cover;
            border-radius: 10px;
        }
        .card {
            height: 100%;
        }
        .card-container {
            height: 400px;
        }
    </style>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">SERVICIOS ADICIONALES</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row" id="services-container">
            <!-- Aquí se cargarán los servicios adicionales -->
        </div>
    </div>

    <?php require('inc/footer.php'); ?>
    <?php require('inc/scripts.php'); ?>

    <script>
        function fetchServices() {
            let xhr = new XMLHttpRequest();
            xhr.open("GET", "admin/ajax/get_services.php", true);
            xhr.onload = function() {
                if (this.status === 200) {
                    let services = JSON.parse(this.responseText);
                    let servicesContainer = document.getElementById('services-container');
                    servicesContainer.innerHTML = '';

                    services.forEach(services => {
                        let servicesCard = `
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 shadow h-100 card-container">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">${services.name}</h5>
                                                <p class="card-text">${services.description}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        servicesContainer.insertAdjacentHTML('beforeend', servicesCard);
                    });
                } else {
                    console.error('Error fetching services:', this.status);
                }
            };
            xhr.send();
        }

        window.onload = function() {
            fetchServices();
        };
    </script>
</body>
</html>
