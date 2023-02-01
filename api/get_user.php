<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$user_id_filter = "";
if (isset($_GET['user_id'])) {
    $empID = $_GET['user_id'];
    if ($empID !== "" && $empID !== "none") {
        $user_id_filter = "AND emp_id = $empID";
    } else {
        $user_id_filter = "AND emp_id = ''";
    }
}

$query = "
    SELECT 
        emp_id,
        emp_fname,
        emp_lname,
        emp_username,
        emp_password,
        CASE
            WHEN app_role = 1 THEN 'Admin'
            WHEN app_role = 2 THEN 'Cashier 1'
            WHEN app_role = 3 THEN 'Cashier 2'
            WHEN app_role = 4 THEN 'Human Resource'
        END app_role,
        app_role app_role_id
    FROM employee
    WHERE 1
    $user_id_filter
";

$stmt = $db->query($query);

$data = array();

while ($r = $stmt->fetch_assoc()) {
    $data[] = $r;
}

echo json_encode($data);
