<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

  $rs =  Database::search("SELECT * FROM `stock` INNER JOIN  `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC");
    $num = $rs->num_rows;

?>





    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock Report</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">


    </head>

    <body>

        <div class="container mt-3" >
           <a href="adminDashboard.php"><img src="Resources/Img/back.png" height="25" alt=""> <img src="Resources/Img/back.png" height="25" alt=""></a>
        </div>

        <div class="container mt-3" id="printArea">
            <h2 class="text-center">Stock report</h2>

            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Stock Id</th>
                        <th>Product Name</th>
                        <th>Stock Qty</th>
                        <th>Unit Price</th>
                    </tr>
                </thead>

                <tbody>
                  <?php
                  for ($i = 0; $i < $num; $i++) {
                    $d = $rs->fetch_assoc();
                    ?>
                    <tr>
                    <td><?php echo $d["stock_id"] ?></td>
                    <td><?php echo $d["name"] ?></td>
                    <td><?php echo $d["qty"] ?></td>
                    <td><?php echo $d["price"] ?></td>
                    </tr>
                    <?php
                  }
                 ?>

                </tbody>

               
            </table>
        </div>

        <div class="container d-flex justify-content-end mt-5 mb-5">
            <button class="btn btn-danger col-2"  onclick="printDiv();">Print</button>
        </div>

<script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a Valid Admin");
}


?>