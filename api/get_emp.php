<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$emp_id_filter = "";
if (isset($_GET['emp_id'])) {
    $empID = $_GET['emp_id'];
    if ($empID !== "" && $empID !== "none") {
        $emp_id_filter = "AND id = $empID";
    } else {
        $emp_id_filter = "AND id = ''";
    }
}

$query = "
    SELECT 
        * 
    FROM emp_list
    WHERE 1
    $emp_id_filter
";

$stmt = $db->query($query);

$data = array();

while ($r = $stmt->fetch_assoc()) {
    $data[] = $r;
}

echo json_encode($data);
