<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeniZ Online</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="Resources/iconup.ico" />
    </head>

    <body onload="loadCart();">
        <!--navBar-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand h1 mb-0" href="home.php">
                <img class="me-3" src="Resources/Img/logow.png" height="50" />
            </a>

            <button class="navbar-toggler" style="align-items: end;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                
            <span class="navbar-toggler-icon"></span>
            </button>


            <div class="d-flex justify-content-end">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">

                        <li class="nav-item nba me-5">
                            <a class="nav-link active" aria-current="page" href="index.php">All Products</a>
                        </li>

                        <li class="nav-item nbu me-5">
                            <a class="nav-link active" aria-current="page" href="profile.php">User Profile</a>
                        </li>

                        <li class="nav-item nbu me-5">
                            <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item nbh me-5">
                            <a class="nav-link active" aria-current="page" href="orderHistory.php">Orders</a>
                        </li>

                        <li class="nav-item nbc me-5">
                            <a class="nav-link active" aria-current="page" href="cart.php"   style="color: white;">Cart</a>
                        </li>

                        <li class="nav-item nbs">
                            <a class="nav-link active" aria-current="page" href="#" onclick="signOut();"> Sign Out</a> <!-- Corrected href -->
                        </li>


                    </ul>

                </div>

            </div>

        </div>
    </nav>
        <!--navBar-->

        <div class="container mt-5">
            <div class="row" id="cartBody">

                <!--Cart load here-->

              
                <!-- checkout -->

              
            </div>

        </div>


<br><br><br>

        <?php include "footer.php" ?>


        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>
    </html>

<?php

} else {
    header("location: signIn.php");
}



?>