<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$acct_type = $_POST['acct_type'];

$query = "
    SELECT 
        * 
    FROM employee 
    WHERE
    emp_username = '$uname'
";

$stmt = $db->query($query);
$employee = $stmt->fetch_assoc(); // fetch data   

if (is_array($employee) && count($employee) > 0) {
    echo json_encode(array('error' => "Username is already taken."));
} else {
    $query2 = "
    INSERT INTO
        employee (emp_fname, emp_lname, emp_username, emp_password, app_role)
    VALUES
        (?, ?, ?, ?, ?);
    ";

    $stmt2 = $db->prepare($query2);

    $stmt2->bind_param("ssssi", $fname, $lname, $uname, $pass, $acct_type);

    if ($stmt2->execute()) {
        echo json_encode(array("result" => "success"));
    } else {
        echo json_encode(array('error' => "Incorrect password or Employee is not yet registered"));
    }
}
