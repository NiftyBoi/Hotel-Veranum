<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - services</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">services</h3>
                <div class="card-body">
                    <div class="text-end mb-4">
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-services-modal">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <div class="table-responsive-lg">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                            <tbody id="services-data">
                                <!-- Aquí se mostrarán los services -->
                                <?php
                                // PHP para mostrar los services (puedes dejarlo vacío inicialmente)
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD services MODAL -->
    <div class="modal fade" id="add-services-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="add_services_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add services</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT services MODAL -->
    <div class="modal fade" id="edit-services-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="edit_services_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit services</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                            <input type="hidden" name="services_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>

    <script>
        let add_services_form = document.getElementById('add_services_form');
        add_services_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_services();
        });

        let edit_services_form = document.getElementById('edit_services_form');
        edit_services_form.addEventListener('submit', function(e) {
            e.preventDefault();
            edit_services();
        });

        function add_services() {
            let data = new FormData(add_services_form);
            data.append('add_services', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/services.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    let myModal = new bootstrap.Modal(document.getElementById('add-services-modal'));
                    myModal.hide();

                    if (this.responseText.trim() === '1') {
                        alert('services added successfully');
                        add_services_form.reset();
                        fetchServices();
                    } else {
                        alert('Error adding services');
                    }
                }
            };

            xhr.send(data);
        }

        function fetchServices() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/services.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('services-data').innerHTML = this.responseText;
                } else {
                    console.error('Error fetching services:', this.status);
                }
            };
            xhr.send('get_all_services=1');
        }

        function edit_services() {
            let data = new FormData(edit_services_form);
            data.append('edit_services', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/services.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    let myModal = new bootstrap.Modal(document.getElementById('edit-services-modal'));
                    myModal.hide();

                    if (this.responseText.trim() === '1') {
                        alert('services updated successfully');
                        fetchServices();
                    } else {
                        alert('Error updating services');
                    }
                }
            };

            xhr.send(data);
        }

        function edit_details(id) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/services.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.status === 200) {
                    try {
                        let servicesData = JSON.parse(this.responseText);
                        if (servicesData.servicesdata) {
                            let services = servicesData.servicesdata;
                            document.querySelector('#edit_services_form input[name="name"]').value = services.name;
                            document.querySelector('#edit_services_form textarea[name="description"]').value = services.description;
                            document.querySelector('#edit_services_form input[name="services_id"]').value = services.id;

                            let myModal = new bootstrap.Modal(document.getElementById('edit-services-modal'));
                            myModal.show();
                        } else {
                            console.error("No services data found.");
                        }
                    } catch (e) {
                        console.error("Error parsing JSON response: ", e);
                    }
                } else {
                    console.error("Error in request: ", xhr.status);
                }
            };

            xhr.send('get_services=' + id);
        }

        function remove_services(services_id) {
            if (confirm("Are you sure you want to delete this services?")) {
                let data = new FormData();
                data.append('services_id', services_id);
                data.append('remove_services', '');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/services.php", true);

                xhr.onload = function() {
                    if (this.status === 200) {
                        if (this.responseText === '1') {
                            alert('services deleted successfully');
                            fetchServices();
                        } else {
                            alert('Error deleting services');
                        }
                    }
                };

                xhr.send(data);
            }
        }

        window.onload = function() {
            fetchServices();
        };
    </script>
</body>
</html>
