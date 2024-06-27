
<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

// Log the order history ID being used
error_log("Order History ID (invoice): " . $orderHistoryId);

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
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


<body style="background-color: orangered;">
    <div class="container mt-4 mb-4">
        <div class="border border-3 border-black p-5 rounded-4" style="background-color: whitesmoke;">
            <div class="row">
                <div class="col-md-6">
                    <h3>Order Id: <?php echo $d["order_id"] ?></h3>
                    <h5>Date: <?php echo $d["order_date"] ?></h5>
                </div>
                <div class="col-md-6 text-end">
                    <h1>Invoice</h1>
                    <img src="Resources/Img/logob.png" height="70px">
                    <h5>FeniZ Online</h5>
                    <h5>Colombo 05, Sri Lanka</h5>
                </div>
            </div>
            <div class="mt-4">
                <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                <h4><?php echo $user["mobile"] ?></h4>
                <h5><?php echo $user["no"] ?></h5>
                <h5><?php echo $user["line_1"] ?></h5>
                <h5><?php echo $user["line_2"] ?></h5>
            </div>
            <div class="mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Color</th>
                            <th scope="col">Type</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rs2 =  Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id` 
                        INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` 
                        INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id` INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id` 
                        INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` WHERE `order_item`.`order_history_ohid` = '" . $orderHistoryId . "'");
                        if ($rs2 === false) {
                            die("Order items query failed: " . Database::$connection->error);
                        }

                        $num2 = $rs2->num_rows;
                        for ($i = 0; $i < $num2; $i++) {
                            $d2 = $rs2->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d2["name"] ?></td>
                                <td><?php echo $d2["brand_name"] ?></td>
                                <td><?php echo $d2["cat_name"] ?></td>
                                <td><?php echo $d2["color_name"] ?></td>
                                <td><?php echo $d2["size_name"] ?></td>
                                <td><?php echo $d2["oi_qty"] ?></td>
                                <td>Rs.<?php echo ($d2["price"] * $d2["oi_qty"]) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-end mt-4">
                <h3>Number of Items: <span style="color: blue;"><?php echo $num2 ?></span></h3>
                <h3>Delivery Fee: <span style="color: Green;">Rs: 500.00</span></h3>
                <h3>Net Total: <span  style="color: orange;">Rs: <?php echo ($d["amount"]) ?>.00</span></h3>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
} else {
    echo "No order found for the given ID.";
}
?>

