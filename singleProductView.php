<?php

include "connection.php";

$stockId = $_GET["s"];
// echo($stockId);

if(isset($stockId)){

    $q = "SELECT * 
    FROM `stock` 
    INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
    INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
    INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
    INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
    INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` 
    WHERE `stock`.stock_id = '".$stockId."'";

    $rs = Database::search($q);
    $d = $rs->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en" >

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

<body>
    
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
                            <a class="nav-link active" aria-current="page" href="index.php">All Products</a>
                        </li>

                        <li class="nav-item nbu me-5">
                            <a class="nav-link active" aria-current="page" href="profile.php">User Profile</a>
                        </li>

                        <li class="nav-item nbu me-5">
                            <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item nbh me-5">
                            <a class="nav-link active" aria-current="page" href="orderHistory.php">History</a>
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

    <br><br>

    <div class="adminBody">
    <div class="col-8 row shadow-lg p-5 bg-body-tertiary rounded-2 m-auto pcard">
        <div class="col-6">
            <img src="<?php echo $d["path"]; ?>" class="rounded-3 shadow-lg" width="320px" alt="" srcset="">
        </div>
        <div class="col-6">
            <h4 class="text-info"><?php echo $d["name"]; ?></h4>
            <h5 class="mt-3">Brand: <?php echo $d["brand_name"]; ?></h5>
            <h6 class="mt-3">Category: <?php echo $d["cat_name"]; ?></h6>
            <h6 class="mt-3">Colour: <?php echo $d["color_name"]; ?></h6>
            <h6 class="mt-3">Size: <?php echo $d["size_name"]; ?></h6>
            <p class="mt-3">Description: <?php echo $d["description"]; ?></p>
            <div class="row mt-4">
                <div class="col-2">
                    <input type="text" placeholder="Qty" class="form-control" id="qty">
                </div>

                <div class="col-6 mt-2">
                    <h6 class="text-warning"><?php echo $d["qty"]; ?></h6>
                </div>

            </div>
            <br>
            <h5>Rs: <?php echo $d["price"]; ?>.00</h5>
            <br>
            <div class="d-flex justify-content-center">
            <button class="btn btn-outline-primary col-6" onclick="addtoCart('<?php echo $d['stock_id']?>');">Add To Cart</button>
            <button class="btn btn-outline-primary col-6 ms-2" onclick="buyNow('<?php echo $d['stock_id']?>');">Buy Now</button>
           
        
        </div>

        </div>

    </div>

    </div>


  
    <!-- Footer -->
    <?php include "footer.php"?>
    <!-- Footer -->


<script src="script.js"></script>
<script src="bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</body>

</html>





<?php

    
}else{
    header("location:index.php");
}

?>
