<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$emp_id = $_POST['emp_id'];

$query = "
    DELETE FROM
        emp_list
    WHERE
        id = $emp_id
";

if ($db->query($query)) {
    echo json_encode(array("result" => "success"));
} else {
    echo json_encode(array('error' => "Cannot delete employee."));
}
