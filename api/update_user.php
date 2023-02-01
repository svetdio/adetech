<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$emp_id = $_POST['emp_id'];

$update_query = "
    UPDATE employee SET
";

$changes = array();
foreach ($_POST as $k => $v) {
    if ($k == "emp_id") continue;
    $changes[] = "$k = '$v'";
}

$update_query = $update_query . implode(", ", $changes)  . " WHERE emp_id = '$emp_id'";

$resp = array('result' => true);

if (!$db->query($update_query)) {
    $resp = array('result' => false, 'error' => 'Error in updating the item');
}

echo json_encode($resp);
