<?php
session_start();
$user = $_SESSION["u"];
include "connection.php";
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

<body>
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
                            <a class="nav-link active" aria-current="page" href="orderHistory.php"  style="color: white;">Orders</a>
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




    <div class="container mt-5">
        <div class="row">
            <?php
            $rs =  Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
            $num = $rs->num_rows;

            if ($num > 0) {
            ?>
                <div class="mb-3 mt-5">
                    <h3>Order History</h3>
                </div>

                

                <?php
                while ($d = $rs->fetch_assoc()) {
                ?>
                   

                <section class="container"> 
                    
                    
                    
                            <div class="col-12">
                                <div class="card card-stepper" style="border-radius: 16px;">

                                    <div class="card-body p-5">

                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <div>
                                            <h5>Order ID <span class="text-warning"><?php echo $d["order_id"] ?></span></h5>
                                            <p>Order Date: <?php echo $d["order_date"] ?></p>
                                            </div>
                                            
                                        <div>
                                            <h5 class="mb-0">Your Order <span class="text-primary font-weight-bold"></span></h5>
                                        </div>
                                        <div class="text-end">
                                            <p class="mb-0">Expected Arrival <span>01/12/24</span></p>
                                            <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
                                        </div>
                                        </div>

                                            <div class="ps-5 pe-5">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Total Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");
                                                        while ($d2 = $rs2->fetch_assoc()) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $d2["name"] ?></td>
                                                                <td><?php echo $d2["oi_qty"] ?></td>
                                                                <td>Rs: <?php echo $d2["price"] * $d2["oi_qty"] ?>.00</td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <div>
                                                <h6>Delevery free : Rs 500.00</h6>
                                                <h4>Net Total <span class="text-warning">Rs: <?php echo $d["amount"] ?>.00</span> </h4>
                                            </div>

                                            <br><br><br>

                                            <?php
                                            
                                            
                                                    $ohid = $d["ohid"];
                                                    $processed = $d["processed"];
                                                    $shipped = $d["shipped"];
                                                    $enroute = $d["enroute"];
                                                    $arrived = $d["arrived"];
                                        
                                                    // Display the delivery status
                                                    echo "<ul id='progressbar-2' class='d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2'>";
                                                    echo "<li class='step0 text-center ". ($processed == 1? "active" : ""). "' id='step1'></li>";
                                                    echo "<li class='step0 text-center ". ($shipped == 1? "active" : ""). "' id='step2'></li>";
                                                    echo "<li class='step0 text-center ". ($enroute == 1? "active" : ""). "' id='step3'></li>";
                                                    echo "<li class='step0 text-center ". ($arrived == 1? "active" : ""). "' id='step4'></li>";
                                                    echo "</ul>";
                                                
                                        
                                            
                                            ?>

                                        

                                        <div class="d-flex justify-content-between">
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">Processed</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">Shipped</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">En Route</p>
                                            </div>
                                        </div>
                                        <div class="d-lg-flex align-items-center">
                                            <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                            <div>
                                            <p class="fw-bold mb-1">Order</p>
                                            <p class="fw-bold mb-0">Arrived</p>
                                            </div>
                                        </div>
                                        </div>
                                        <br><br>
                                        <!-- <button class="d-felx col-8 justify-content-between" onclick="openInvo();">View Invoice</button> -->
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            
                    </div>

                    
                    
                </section>

                <br><br>

                
                <?php
                }
                ?>




            <?php
            } else {
            ?>
                <div class="col-12 text-center mt-5">
                    <h2>You Have not Placed Any Orders</h2>
                    <a href="index.php" class="btn btn-primary">Start Shopping</a>
                </div>
            <?php
            }
            ?>
            
        </div>
    </div>

    <br><br><br><br>

    <?php include "footer.php" ?>

    <script src="bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

</body>

</html>

<?php

} else {
    header("location:signIn.php");
}

?>
