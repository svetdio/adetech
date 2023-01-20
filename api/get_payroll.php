<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$emp_id = $_GET['emp_id'];
$pay_date = $_GET['pay_date'];

$query = "
    SELECT * FROM emp_payroll
    WHERE 
    emp_id = '$emp_id'
    AND pay_date = '$pay_date'
";

$stmt = $db->query($query);

$data = array();

while ($r = $stmt->fetch_assoc()) {
    $data[] = $r;
}

echo json_encode($data);
