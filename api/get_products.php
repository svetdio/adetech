<?php
require_once "../config.php";

$type = isset($_GET['type']) ? $_GET['type'] : "";
$item_type_filter = "";
if ($type == "single") {
    $item_type_filter = "AND item_type = 'single'";
} else if ($type == 'bundle1') {
    $item_type_filter = "AND item_type = 'bundle1'";
} else if ($type == 'bundle2') {
    $item_type_filter = "AND item_type = 'bundle2'";
} else if ($type == 'bundle3') {
    $item_type_filter = "AND item_type = 'bundle3'";
} else {

}

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);
$query = "SELECT 
        i.item_id as `id`,
        i.item_type,
        i.item_name as `name`,
        i.item_desc as `desc`,
        i.image,
        i.price,
        IF(il.total_item_qty IS NULL, 0 , il.total_item_qty) qty,
        IF(il.discount IS NULL, 0 , il.discount) discount,
        IF(il.tax_rate IS NULL, 0 , il.tax_rate) tax_rate,
        IF(il.discount IS NULL OR il.discount = 0 , i.price, i.price - (i.price * (il.discount / 100)))  discounted_price
FROM items i
LEFT JOIN items_list il ON i.item_id = il.items_id
WHERE 1
$item_type_filter
ORDER BY i.item_id ASC";

$stmt = $db->query($query);
$result = array();

while ($v = $stmt->fetch_assoc()) {
    $result[] = $v;
}

echo json_encode($result);
