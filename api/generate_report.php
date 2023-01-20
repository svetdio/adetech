<?php

require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$mode = $_GET['mode'];
$sales_number = $_GET['sales_number'];
$base_group = "";
switch ($mode) {
    case "pos":
        $sn_filter = $sales_number == "" ?  "" : "AND o.order_id = $sales_number";
        $base_group = "WHERE i.item_type = 'single'
            $sn_filter
            GROUP BY o.order_id";
        break;
    case "bundle1":
    case "bundle2":
    case "bundle3":
        $sn_filter = $sales_number == "" ?  "" : "AND o.order_id = $sales_number";
        $base_group = "WHERE i.item_type = '$mode'
            $sn_filter
            GROUP BY o.order_id";
        break;
}


$base_query = "SELECT 
        COUNT(*) num_orders,
        o.order_id,
        DATE_FORMAT(od.transaction_date, '%m/%d/%Y') transaction_date,
        i.item_id,
        GROUP_CONCAT(i.item_name) item_name,
        i.item_desc,
        GROUP_CONCAT(od.price) price,
        od.discount,
        od.tax_rate,
        GROUP_CONCAT(od.order_qty) items_sold,
        GROUP_CONCAT(od.order_qty * od.price) gross_sales_total,
        GROUP_CONCAT((od.price * (od.discount / 100)) * od.order_qty) total_discount,
        SUM(od.price * (od.tax_rate / 100) * od.order_qty) total_tax,
        o.paid_amt
    FROM orders o
    LEFT JOIN orders_detail od ON o.order_id = od.order_id 
    LEFT JOIN items i ON od.item_id = i.item_id
    LEFT JOIN items_list il ON i.item_id = il.items_id
    LEFT JOIN employee e ON e.emp_id = o.emp_id
    $base_group
";


$query = "SELECT *, gross_sales_total - total_tax - total_discount net_sales FROM (
	$base_query
) base
ORDER BY net_sales DESC";

$stmt = $db->query($query);
$result = array();

while ($v = $stmt->fetch_assoc()) {
    $result[] = $v;
}

echo json_encode($result);
