<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs =  Database::search("SELECT * FROM `product`
    INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
    INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
    INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
    INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
    ORDER BY `product`.`id` ASC;");

    $num = $rs->num_rows;

?>

<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Report</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
    </head>

    <body>

        <div class="container mt-3">
            <a href="adminDashboard.php"><img src="Resources/Img/back.png" height="25" alt=""> <img src="Resources/Img/back.png" height="25" alt=""></a>
        </div>


        <div class="container mt-3" id="printArea">
            <h2 class="text-center">Product report</h2>

            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Brand Name</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Type</th>
                        <th>Discription</th>
                        <th>Image</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <tr>
                            <td><?php echo $d["id"] ?></td>
                            <td><?php echo $d["name"] ?></td>
                            <td><?php echo $d["brand_name"] ?></td>
                            <td><?php echo $d["cat_name"] ?></td>
                            <td><?php echo $d["color_name"] ?></td>
                            <td><?php echo $d["size_name"] ?></td>
                            <td><?php echo $d["description"] ?></td>
                            <td><img src="<?php echo $d["path"] ?>" height="100"></td>
                            
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