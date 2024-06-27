<?php
    include 'connection.php';
    
    if(isset($_POST['update_status'])) {
        $order_id = $_POST['order_id'];
        $processed = $_POST['processed'];
        $shipped = $_POST['shipped'];
        $enroute = $_POST['enroute'];
        $arrived = $_POST['arrived'];
        

        $d = Database::iud("UPDATE order_history SET processed = '$processed', shipped = '$shipped', enroute = '$enroute', arrived = '$arrived' WHERE order_id = '$order_id'");
        if ($d == 0) {
            echo "Status updated successfully";
            header("Location: adminDelivery.php");
        } else {
            echo "Error updating status: ";
        }
    }
?>