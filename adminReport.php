<?php
session_start();
include "connection.php";

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

    <body class="adminBody">
        <!-- nav bar  -->
        <?php
        include "adminNavBar.php";
        ?>
        <!-- nav bar  -->

        <div class="col-10" style="backdrop-filter: blur(10px);">
            <h2 class="text-center" style="color: orangered;">Reports</h2>

            <div class="row mt-5">
                <div class="col-4 mt-5">
                    <a href="adminReportStock.php"><button class="btn btn-outline-info col-12" style="color: black;">Stock Report</button></a>
                </div>

                <div class="col-4 mt-5">
                    <a href="adminReportProduct.php"> <button class="btn btn-outline-warning col-12" style="color: black;">Product Report</button></a>
                </div>

                <div class="col-4 mt-5">
                  <a href="adminReportUser.php"> <button class="btn btn-outline-success col-12" style="color: black;"> User Report</button></a> 
                </div>
            </div>

        </div>

        <div class="fixed-bottom col-12">
            <p class="text-center" style="color: white;">&copy; 2024 Feniz Online.lk || All Right Reserved</p>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>


<?php

} else {
    echo ("You are not a Valid Admin");
}


?>