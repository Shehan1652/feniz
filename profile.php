<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

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

    <body class="adminBody">
        <!-- nav bar  -->

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
                                <a class="nav-link active" aria-current="page" href="profile.php" style="color: white;">User Profile</a>
                            </li>

                            <li class="nav-item nbu me-5">
                                <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                            </li>

                            <li class="nav-item nbh me-5">
                                <a class="nav-link active" aria-current="page" href="orderHistory.php">Orders</a>
                            </li>

                            <li class="nav-item nbc me-5">
                                <a class="nav-link active" aria-current="page" href="cart.php">Cart</a>
                            </li>

                            <li class="nav-item nbs">
                                <a class="nav-link active" aria-current="page" href="#" onclick="signOut();"> Sign Out</a> <!-- Corrected href -->
                            </li>


                        </ul>

                    </div>

                </div>

            </div>
        </nav>

        <!-- nav bar  -->

        <div class="container mt-5" style="backdrop-filter: blur(10px);">
            <br>
            <br>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="<?php

                                if (!empty($d["img_path"])) {

                                    echo $d["img_path"];
                                } else {
                                    echo ("Resources\Img\profile.png");
                                }

                                ?>" class="img-fluid rounded-circle" height="150px" id="i" alt="Profile Image">
                    <div class="mt-3">
                        <label for="profileImage" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" id="imgUploader" />
                        <button class="btn btn-outline-warning mt-2 col-12" onclick="uploadImg();">Upload</button>
                    </div>
                </div>

                <div class="col-md-8">
                    <h2 class="text-center">Profile Details</h2>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name" value="<?php echo isset($d["fname"]) ? $d["fname"] : ''; ?>" id="fname" />
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo isset($d["lname"]) ? $d["lname"] : ''; ?>" id="lname" />
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email" value="<?php echo isset($d["email"]) ? $d["email"] : ''; ?>" id="email" />
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" class="form-control" placeholder="Mobile" value="<?php echo isset($d["mobile"]) ? $d["mobile"] : ''; ?>" id="mobile" />
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" placeholder="Username" value="<?php echo isset($d["username"]) ? $d["username"] : ''; ?>" disabled />
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" value="<?php echo isset($d["password"]) ? $d["password"] : ''; ?>" id="pw" />
                        </div>

                        <h5 class="mt-4">Shipping Address</h5>

                        <div class="row mt-3">
                            <div class="col-md-3">
                                <label for="addressNo" class="form-label">No</label>
                                <input type="text" class="form-control" placeholder="No" value="<?php echo isset($d["no"]) ? $d["no"] : ''; ?>" id="no" />
                            </div>
                            <div class="col-md-9">
                                <label for="addressLine1" class="form-label">Line 1</label>
                                <input type="text" class="form-control" placeholder="Line 1" value="<?php echo isset($d["line_1"]) ? $d["line_1"] : ''; ?>" id="line1" />
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="addressLine2" class="form-label">Line 2</label>
                                <input type="text" class="form-control" placeholder="Line 2" value="<?php echo isset($d["line_2"]) ? $d["line_2"] : ''; ?>" id="line2" />
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-center">
                            <button class="btn btn-outline-warning col-md-6" onclick="updateData();">Update</button>
                        </div>

                    </div>
                </div>



            </div>
        </div>


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>

    </html>
    <?php
} else {
    header("location: signIn.php");
}

?>
