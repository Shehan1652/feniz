<?php
include "connection.php";

$rs = Database::search("SELECT
    DATE_FORMAT(order_date, '%Y-%m-%d %H:00:00') AS hour,
    SUM(amount) AS total_income
FROM
    feniz.order_history
GROUP BY
    DATE_FORMAT(order_date, '%Y-%m-%d %H:00:00')
ORDER BY
    hour;
");

$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();


    $labels[] = $d["hour"];
    $data[] = $d["total_income"];
    # code...
}

$json = array();

$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);
