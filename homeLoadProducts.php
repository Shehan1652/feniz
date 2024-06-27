<?php

include "connection.php";


$pageno = 0;
$page = $_POST["p"];
// echo($page);


if (0 != $page) {
    $pageno = ($pageno = $page);
} else {
    $pageno = 1;
}


$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;
// echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
// echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;
// echo($page_results);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

if ($num2 == 0) {
    echo ("No Products Here..");
} else {

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
?>
        <!-- card  -->
        <div class="d-flex justify-content-center col-12  col-lg-3 mt-3">
            <div class="card" style="width: 300px">
            <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src="<?php echo $d["path"]; ?>" class="card-img-top" alt="..."></a>
              
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"]; ?></h5>
                    <p class="card-text"><?php echo $d["description"]; ?></p>
                    <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    </div>
                    <p class="card-text">Rs: <?php echo $d["price"]; ?>.00</p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    
<?php
 } 
 ?>