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
            <?php $status = $d['status'];
            if ($status == 1) {
            ?>
            <div class="card" style="width: 300px">
                <div style="height: 350px;">
                    <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src="<?php echo $d["path"]; ?>" class="card-img-top" style="height: 100%;" alt="..."></a>
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px;"><?php echo $d["name"]; ?></h5>
                    <p class="card-text" style="height: 140px;"><?php echo $d["description"]; ?></p>
                    <div class="" style="height: 40px;">
                        <?php
                        
                        
                        if ($status == 1) {
                            ?>
                            <button class="col-10 p-1 justify-content-center" style="background-color: greenyellow; color:black; font-weight: bolder; border-radius: 10px;">IN STOCK</button>
                            <?php
                        } else {
                            ?>
                            <button class="col-10 p-1 justify-content-center" style="background-color: red; color:white; font-weight: bolder; border-radius: 10px;">OUT OF STOCK</button>
                            <?php
                        }


                        ?>
                            
                        
                    </div>
                    <div class="card-footer-bottom" style="height: 40px;">
                        <div class="star">
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        </div>
                        <p class="card-text">Rs: <?php echo $d["price"]; ?>.00</p>
                    </div>
                </div>
            </div>

            <?php
            }else {
            ?>
            
            <div class="card" style="width: 300px; background-color: #7c7c7c57;">
                <div style="height: 350px;">
                    <img src="<?php echo $d["path"]; ?>" class="card-img-top" style="height: 100%;" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="height: 50px;"><?php echo $d["name"]; ?></h5>
                    <p class="card-text" style="height: 140px;"><?php echo $d["description"]; ?></p>
                    <div style="height: 40px;">
                        <?php
                        
                        
                        if ($status == 1) {
                            ?>
                            <button class="col-10 p-1 justify-content-center" style="background-color: greenyellow; color:black; font-weight: bolder; border-radius: 10px;">IN STOCK</button>
                            <?php
                        } else {
                            ?>
                            <button class="col-10 p-1 justify-content-center" style="background-color: red; color:white; font-weight: bolder; border-radius: 10px;">OUT OF STOCK</button>
                            <?php
                        }


                        ?>
                            
                        
                    </div>
                    <div class="card-footer-bottom" style="height: 40px;">
                        <div class="star" >
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: #ddb500;"></i>
                        <i class="fas fa-star" style="color: black;"></i>
                        </div>
                        <p class="card-text">Rs: <?php echo $d["price"]; ?>.00</p>
                    </div>
                </div>
            </div>

            <?php
            }
            ?>

        </div>
    <?php
    }
    ?>

    <!-- pagination  -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="loadProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Previous</a></li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="loadProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                    <?php

                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="loadProduct(<?php echo ($y) ?>);"><?php echo ($y) ?></a>
                        </li>
                <?php
                    }
                }

                ?>





                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?>onclick="loadProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                }
                                                                                                                    ?>>Next</a></li>
            </ul>
        </nav>
    </div>

<?php
}

?>