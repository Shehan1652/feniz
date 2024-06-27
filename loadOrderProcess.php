<?php

include "connection.php";

$rs = Database::search("SELECT `order_id` , `order_date` , `amount` , `processed` , `shipped` , `enroute` , `arrived` FROM `order_history` WHERE `processed` = '1'");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();
?>

    <tr>
        <th scope="row"><?php echo $d["order_id"] ?></th>
        <td><?php echo $d["order_date"] ?></td>
        <td>Rs: <?php echo $d["amount"] ?>.00</td>
        <td><?php





            if ($d["processed"] == 1) {
                echo ("Done");
            } else {
                echo ("Not Yet");
            }
            ?></td>
        <td><?php
            if ($d["shipped"] == 1) {
                echo ("Done");
            } else {
                echo ("Not Yet");
            }
            ?></td>
        <td><?php
            if ($d["enroute"] == 1) {
                echo ("Done");
            } else {
                echo ("Not Yet");
            }
            ?></td>
        <td><?php
            if ($d["arrived"] == 1) {
                echo ("Done");
            } else {
                echo ("Not Yet");
            }
            ?></td>
    </tr>

<?php

}

?>