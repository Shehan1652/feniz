<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeniZ Online Admin</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/iconup.ico" />
    </head>

    <body class="adminBody" onload="loadOrder();">

        <!-- nav Bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav Bar -->


        <div class="col-10 p-5 mt-5 container-fuild" style="backdrop-filter: blur(50px);">
            <h2 class="text-center" style="color: orangered;">Delivery Management</h2>

            <div class="row d-flex justify-content-end mt-4">

                <div class="d-none" id="msgDiv" onclick="reload();">
                    <div class="alert alert-danger" id="msg"></div>
                </div>


            </div>

            
            <form style="font-weight: bolder; color:white;" class="row col-12 d-flex justify-content-center" method="post" action="update_status.php">
            <input style="border-radius: 20px;" class=" col-12 col-sm-2" type="text" id="order_id" name="order_id" placeholder="Enter Order ID">
            <div class=" col-12 col-sm-2">
            <label class="form-label">Processed</label>
            <select class="form-select" id="processed" name="processed">
                <option value="1">Done</option>
                <option value="2">Not Yet</option>
            </select>
            </div>
            <div class=" col-12 col-sm-2">
            <label class="form-label">Shipped</label>
            <select class="form-select" id="shipped" name="shipped">
                <option value="1">Done</option>
                <option value="2">Not Yet</option>
            </select>
            </div>
            <div class=" col-12 col-sm-2">
            <label class="form-label">EnRoute</label>
            <select class="form-select" id="enroute" name="enroute">
                <option value="1">Done</option>
                <option value="2">Not Yet</option>
            </select>
            </div>
            <div class=" col-12 col-sm-2">
            <label class="form-label">Arrived</label>
            <select class="form-select" id="arrived" name="arrived">
                <option value="1">Done</option>
                <option value="2">Not Yet</option>
            </select>
            </div>
            <input style="border-radius: 20px;" class=" col-12 col-sm-2 btn btn-outline-warning" type="submit" value="Update Status" name="update_status" onclick="updateStatus()">
            </form>
            <br><br>




            <script>
            function updateOrderStatus() {
                var form = document.getElementById('updateOrderForm');
                var formData = new FormData(form);

                var request = new XMLHttpRequest();
                request.onreadystatechange = function () {
                    if (request.readyState == 4 & request.status == 200) {
                        var response = request.responseText;
                        alert(response);
                        loadOrder(); // Reload the orders to reflect the changes
                    }
                };

                request.open("POST", "updateOrderStatus.php", true);
                request.send(formData);
            }
            </script>

            <div class="mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Order No</th>
                            <th scope="col">Date & Time</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Processed</th>
                            <th scope="col">Shipped</th>
                            <th scope="col">En Route</th>
                            <th scope="col">Arrived</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- Table Row -->

                        <!-- Table Row -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center" style="color: white;">&copy; 2024 Feniz Online.lk || All Right Reserved</p>
        </div>
        <!-- Footer -->

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php


} else {
    echo ("You are not a Valid Admin");
}
