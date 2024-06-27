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

    <body class="adminBody">
        <!-- nav Bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav Bar -->

        <div class="col-10" style="backdrop-filter: blur(10px);">
            <h2 class="text-center" style="color: orangered;">Product Management</h2>

            <div class="row mt-5">
                <!-- Brand Register -->
                <div class="col-4 offset-1">

                    <label for="form-label">Brand Name :</label>
                    <input type="text" class="form-control mb-3" id="brand"/>

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="brandReg();">Brand Register</button>
                    </div>

                </div>
                <!-- Brand Register -->

                <!-- Category Register -->
                <div class="col-4 offset-2">

                    <label for="form-label">Category :</label>
                    <input type="text" class="form-control mb-3" id="cat"/>

                    <div class="d-none" id="msgDiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="categoryReg();">Category Register</button>
                    </div>

                </div>
                <!-- Category Register -->

            </div>

            <div class="row mt-5">
                <!-- Color Register -->
                <div class="col-4 offset-1 mt-4">

                    <label for="form-label">Color :</label>
                    <input type="text" class="form-control mb-3" id="color"/>

                    <div class="d-none" id="msgDiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="colorReg();">Color Register</button>
                    </div>

                </div>
                <!-- Color Register -->

                <!-- Size Register -->
                <div class="col-4 offset-2 mt-4">

                    <label for="form-label">Size :</label>
                    <input type="text" class="form-control mb-3" id="size"/>

                    <div class="d-none" id="msgDiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="sizeReg();">Size Register</button>
                    </div>

                </div>
                <!-- Size Register -->

            </div>

        </div>

        <div class="fixed-bottom col-12">
            <p class="text-center" style="color: white;">&copy; 2024 Feniz Online.lk || All Rights Reserved</p>
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