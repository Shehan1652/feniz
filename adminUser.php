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

    <body class="adminBody" onload="loadUser();">

        <!-- nav Bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav Bar -->

        <div class="col-10" style="backdrop-filter: blur(10px);">
            <h2 class="text-center" style="color: orangered;">User Management</h2>

            <div class="row d-flex justify-content-end mt-4">

                <div class="d-none" id="msgDiv" onclick="reload();">
                    <div class="alert alert-danger" id="msg"></div>
                </div>

                <div class="col-2">
                    <input type="text" class="form-control" placeholder=" User Id" id="uid"/>
                </div>

                <button class="btn btn-outline-light col-2" onclick="updateUserStatus();">Change Status</button>

            </div>

            <div class="mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
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
