<?php

require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

// var_dump($_POST);
$params = $_POST['params'];
$emp_id = $_POST['emp_id'];
$pay_date = $_POST['pay_date'];

$base_query = "INSERT INTO emp_payroll
SET 
";
$where_clause = "
    emp_id = '$emp_id',
    pay_date = '$pay_date',
    ";

$cols = array();
foreach ($_POST['params'] as $k => $v) {
    $cols[] = "$k = '$v'";
}

$query = $base_query . $where_clause . " " . implode(", ", $cols) . " ON DUPLICATE KEY UPDATE " . implode(", ", $cols);

$resp = array('result' => true);

if (!$db->query($query)) {
    $resp = array('result' => false, 'error' => 'Error in updating the payroll');
}

$resp['affected_rows'] = $db->affected_rows;

echo json_encode($resp);
