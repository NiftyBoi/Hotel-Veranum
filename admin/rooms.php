<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rooms</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">ROOMS</h3>
                <div class="card-body">
                    <div class="text-end mb-4">
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room-modal">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Area</th>
                                    <th scope="col">Guests</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="room-data">
                                <!-- Aquí se mostrarán las habitaciones -->
                                <?php
                                // Aquí deberías tener tu código PHP para obtener las habitaciones y mostrarlas en la tabla
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD ROOM MODAL -->
    <div class="modal fade" id="add-room-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="add_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ADD Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">NAME</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult (Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
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

    <!-- EDIT ROOM MODAL -->
    <div class="modal fade" id="edit-room-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="edit_room_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">NAME</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="number" min="1" name="area" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult (Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="desc" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                            <input type="hidden" name="room_id">
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
        let add_room_form = document.getElementById('add_room_form');
        add_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_rooms();
        });

        let edit_room_form = document.getElementById('edit_room_form');
        edit_room_form.addEventListener('submit', function(e) {
            e.preventDefault();
            edit_details();
        });

        function add_rooms() {
            let data = new FormData(add_room_form);
            data.append('add_room', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    let myModal = new bootstrap.Modal(document.getElementById('add-room-modal'));
                    myModal.hide();

                    if (this.responseText.trim() === '1') {
                        alert('success', 'New room added');
                        add_room_form.reset();
                        get_all_rooms();
                    } else {
                        alert('error', 'Server down');
                    }
                }
            };
            xhr.send(data);
        }

        function get_all_rooms() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('room-data').innerHTML = this.responseText;
                } else {
                    console.error('Error fetching rooms:', this.status);
                }
            };

            xhr.send('get_all_rooms=1');
        }

        function toggle_status(id, val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/rooms.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.status === 200) {
                    if (this.responseText.trim() === '1') {
                        alert('success', 'Status toggled');
                        get_all_rooms();
                    } else {
                        alert('error', 'Server down');
                    }
                }
            };

            xhr.send('toggle_status=' + id + '&value=' + val);
        }

        function edit_details(id) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/rooms.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (this.status === 200) {
            try {
                let roomData = JSON.parse(this.responseText);
                if (roomData.roomdata) {
                    let room = roomData.roomdata;
                    document.querySelector('#edit_room_form input[name="name"]').value = room.name;
                    document.querySelector('#edit_room_form input[name="area"]').value = room.area;
                    document.querySelector('#edit_room_form input[name="price"]').value = room.price;
                    document.querySelector('#edit_room_form input[name="quantity"]').value = room.quantity;
                    document.querySelector('#edit_room_form input[name="adult"]').value = room.adult;
                    document.querySelector('#edit_room_form input[name="children"]').value = room.children;
                    document.querySelector('#edit_room_form textarea[name="desc"]').value = room.desc;
                    document.querySelector('#edit_room_form input[name="room_id"]').value = room.id;

                    let myModal = new bootstrap.Modal(document.getElementById('edit-room-modal'));
                    myModal.show();
                } else {
                    console.error("No room data found.");
                }
            } catch (e) {
                console.error("Error parsing JSON response: ", e);
            }
        } else {
            console.error("Error in request: ", xhr.status);
        }
    };

    xhr.send('get_room=' + id);
}

        function remove_room(room_id) {
    if (confirm("¿Estás seguro de que quieres eliminar esta habitación?")) {
        let data = new FormData();
        data.append('room_id', room_id);
        data.append('remove_room', '');

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/rooms.php", true);

        xhr.onload = function () {
            if (this.status == 200) {
                if (this.responseText == 1) {
                    alert('Éxito: Habitación eliminada');
                    get_all_rooms(); // Otra función para actualizar la lista de habitaciones después de la eliminación
                } else {
                    alert('Error: No se pudo eliminar la habitación');
                }
            } else {
                alert('Error: Problema con la solicitud AJAX');
            }
        };

        xhr.onerror = function () {
            alert('Error: Problema de red al intentar eliminar la habitación');
        };

        xhr.send(data);
    }
}


        window.onload = function() {
            get_all_rooms();
        };
    </script>
</body>
</html>
