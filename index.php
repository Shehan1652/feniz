<?php

include "connection.php";

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

<body onload="loadProduct(0);">

    <!-- nav bar -->
    
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
                            <a class="nav-link active" aria-current="page" href="index.php" style="color: white;">All Products</a>
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

    <br><br><br>

    <!-- basic search  -->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" class="form-control" placeholder="Search" onkeyup="searchProduct(0);" id="product">
        </div>
        <button class="btn btn-outline-info col-1 mt-3 ms-2" onclick="viewFilter();">Filter</button>
    </div>

    <!-- basic search  -->

    <!-- Advance Search  -->
    <div class="d-none" id="filterId">
        <div class="border border-light rounded-4 mt-4 p-5 col-10 offset-1">
            <div class="row col-12">

                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Color</label>
                    <select name="color" class="bg-light form-select" id="color">
                        <option value="0">Select Color</option>
                  
                        <?php
                        $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>

                            <option value="<?php echo $d['color_id']; ?>"><?php echo $d['color_name']; ?></option>
                        <?php
                        }
                        ?>

                        <!-- Add more color options as needed -->
                    </select>
                </div>


                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Category</label>
                    <select name="color" class="bg-light form-select" id="cat">
                        <option value="0">Select Category</option>

                        <?php
                         $rs2 = Database::search("SELECT * FROM `category`");
                        $num2 = $rs2->num_rows;
                        for ($i = 0; $i < $num2; $i++) {
                            $d2 = $rs2->fetch_assoc();
                            ?>

                            <option value="<?php echo $d2['cat_id']; ?>"><?php echo $d2['cat_name']; ?></option>
                            <?php
                               }  
                            ?>
                                       
                     
                      
                        <!-- Add more color options as needed -->
                    </select>
                </div>
            </div>

            <div class="row col-12 mt-3">
                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Brand</label>
                    <select name="color" class="bg-light form-select" id="brand">
                        <option value="0">Select Brand</option>
                       

                        <?php
                         $rs3 = Database::search("SELECT * FROM `brand`");
                        $num3 = $rs3->num_rows;
                        for ($i = 0; $i < $num3; $i++) {
                            $d3 = $rs3->fetch_assoc();
                            ?>

                            <option value="<?php echo $d3['brand_id']; ?>"><?php echo $d3['brand_name']; ?></option>
                            <?php
                               }  
                            ?>
                                       


                        <!-- Add more color options as needed -->
                    </select>
                </div>


                <div class="col-6 ms-auto">
                    <label for="color-select" class="form-label">Type</label>
                    <select name="color" class="bg-light form-select" id="size">
                        <option value="0">Select Type</option>
                     

                        <?php
                         $rs4 = Database::search("SELECT * FROM `size`");
                        $num4 = $rs4->num_rows;
                        for ($i = 0; $i < $num4; $i++) {
                            $d4 = $rs4->fetch_assoc();
                            ?>

                            <option value="<?php echo $d4['size_id']; ?>"><?php echo $d4['size_name']; ?></option>
                            <?php
                               }  
                            ?>




                        <!-- Add more color options as needed -->
                    </select>
                </div>
            </div>

            <div class="mt-4 row col-12">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Min Price" id="min" />
                </div>

                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Max Price" id="max" />
                </div>

                <button class="btn btn-outline-info col-2" onclick="advSearchProduct(0);">Search</button>


            </div>

        </div>

    </div>


    <!-- load product  -->

    <section id="product1">
        <h2>#stayhome</h2>
        <p>Save more with coupons &amp; up to 70% off!</p>
    

    <div class="row col-10 offset-1" id="pid">



    </div>

    </section>

    <!-- load product  -->



    <!-- Footer -->
    <?php include "footer.php" ?>
    <!-- Footer -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>






