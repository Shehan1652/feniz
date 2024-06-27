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

        <?php
        include "adminNavBar.php";
        ?>

        <div class="container-fluid"">
        <br><br><br><br><br><br><br><br><br><br>
            <div class="row"  >
                <div class="col-5 offset-1" style="backdrop-filter: blur(10px);">
                    <h2 class="text-center" style="color: orangered;">Product Registration</h2>

                    <div class="mb-3">
                        <label class="form-label" for="pname">Product Name</label>
                        <input id="pname" type="text" class="form-control">
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label class="form-label" for="brand">Brand</label>
                            <select class="form-select" id="brand">
                                <option value="0" style="background-color: black;">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['brand_id']; ?>"><?php echo $data['brand_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="cat">Catogory</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['cat_id']; ?>"><?php echo $data['cat_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>


                        <div class="mb-3 col-6">
                            <label class="form-label" for="color">Color</label>
                            <select class="form-select" id="color">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['color_id']; ?>"><?php echo $data['color_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>

                        <div class="mb-3 col-6">
                            <label class="form-label" for="size">Size</label>
                            <select class="form-select" id="size">
                                <option value="0">Select</option>
                                <?php
                                $rs = Database::search("SELECT * FROM `size`");
                                $num = $rs->num_rows;

                                for ($x = 0; $x < $num; $x++) {
                                    $data = $rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo $data['size_id']; ?>"><?php echo $data['size_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="desc">Description</label>
                        <textarea class="form-control" rows="5" id="desc"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="file">Upload Image</label>
                        <input type="file" class="form-control" id="file">
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-secondary" onclick="regProduct();">Register Product</button>
                    </div>
                </div>


                <!-- Stock Update -->
                <div class="col-5" style="backdrop-filter: blur(10px);">
                    <h2 class="text-center" style="color: orangered;">Stock Update</h2>

                    <div class="mb-3">
                        <label class="form-label" for="selectProduct">Product Name</label>
                        <select class="form-select" id="selectProduct">
                       
                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="qty">Qty</label>
                        <input type="text" class="form-control" id="qty" required/>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="unitPrice">Unit Price</label>
                        <input type="text" class="form-control" id="uprice"  required/>
                    </div>

                    <div class="d-grid mb-3">
                        <button class="btn btn-secondary" onclick="updateStock();">Update Stock</button>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        
        <!-- Footer -->
        <div class="fixed-bottom col-12">
            <p class="text-center" style="color: white;">&copy; 2024 Feniz Online.lk || All Rights Reserved</p>
        </div>
        <!-- Footer -->

        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo "You are not a Valid Admin";
}
?>