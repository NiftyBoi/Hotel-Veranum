<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dishes</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">DISHES</h3>
                <div class="card-body">
                    <div class="text-end mb-4">
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-dish-modal">
                            <i class="bi bi-plus-square"></i> Add
                        </button>
                    </div>

                    <div class="table-responsive-lg">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="dish-data">
                                <!-- Aquí se mostrarán los platillos -->
                                <?php
                                // PHP para mostrar los platillos (puedes dejarlo vacío inicialmente)
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADD DISH MODAL -->
    <div class="modal fade" id="add-dish-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="add_dish_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ADD Dish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Image</label>
                                <input type="file" name="image" class="form-control shadow-none" required>
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

    <!-- EDIT DISH MODAL -->
    <div class="modal fade" id="edit-dish-modal" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form id="edit_dish_form" autocomplete="off">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Dish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Description</label>
                                <textarea name="description" rows="4" class="form-control shadow-none" required></textarea>
                            </div>
                            <input type="hidden" name="dish_id">
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
        let add_dish_form = document.getElementById('add_dish_form');
        add_dish_form.addEventListener('submit', function(e) {
            e.preventDefault();
            add_dish();
        });

        let edit_dish_form = document.getElementById('edit_dish_form');
        edit_dish_form.addEventListener('submit', function(e) {
            e.preventDefault();
            edit_dish();
        });

        function add_dish() {
            let data = new FormData(add_dish_form);
            data.append('add_dish', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/dishes_ajax.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    let myModal = new bootstrap.Modal(document.getElementById('add-dish-modal'));
                    myModal.hide();

                    if (this.responseText.trim() === '1') {
                        alert('Dish added successfully');
                        add_dish_form.reset();
                        fetchDishes();
                    } else {
                        alert('Error adding dish');
                    }
                }
            };

            xhr.send(data);
        }

        function fetchDishes() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/dishes_ajax.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (this.status === 200) {
                    document.getElementById('dish-data').innerHTML = this.responseText;
                } else {
                    console.error('Error fetching dishes:', this.status);
                }
            };
            xhr.send('get_all_dishes=1');
        }

        function edit_dish() {
            let data = new FormData(edit_dish_form);
            data.append('edit_dish', '');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/dishes_ajax.php", true);

            xhr.onload = function() {
                if (this.status === 200) {
                    let myModal = new bootstrap.Modal(document.getElementById('edit-dish-modal'));
                    myModal.hide();

                    if (this.responseText.trim() === '1') {
                        alert('Dish updated successfully');
                        fetchDishes();
                    } else {
                        alert('Error updating dish');
                    }
                }
            };

            xhr.send(data);
        }

        function edit_details(id) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/dishes_ajax.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (this.status === 200) {
                    try {
                        let dishData = JSON.parse(this.responseText);
                        if (dishData.dishdata) {
                            let dish = dishData.dishdata;
                            document.querySelector('#edit_dish_form input[name="name"]').value = dish.name;
                            document.querySelector('#edit_dish_form input[name="price"]').value = dish.price;
                            document.querySelector('#edit_dish_form textarea[name="description"]').value = dish.description;
                            document.querySelector('#edit_dish_form input[name="dish_id"]').value = dish.id;

                            let myModal = new bootstrap.Modal(document.getElementById('edit-dish-modal'));
                            myModal.show();
                        } else {
                            console.error("No dish data found.");
                        }
                    } catch (e) {
                        console.error("Error parsing JSON response: ", e);
                    }
                } else {
                    console.error("Error in request: ", xhr.status);
                }
            };

            xhr.send('get_dish=' + id);
        }

        function remove_dish(dish_id) {
            if (confirm("Are you sure you want to delete this dish?")) {
                let data = new FormData();
                data.append('dish_id', dish_id);
                data.append('remove_dish', '');

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/dishes_ajax.php", true);

                xhr.onload = function() {
                    if (this.status === 200) {
                        if (this.responseText === '1') {
                            alert('Dish deleted successfully');
                            fetchDishes();
                        } else {
                            alert('Error deleting dish');
                        }
                    }
                };

                xhr.send(data);
            }
        }

        window.onload = function() {
            fetchDishes();
        };
    </script>
</body>
</html>
