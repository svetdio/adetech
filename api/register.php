<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$query = "
    SELECT 
        * 
    FROM employee 
    WHERE
    uname = '$uname'
";

$stmt = $db->query($query);
$employee = $stmt->fetch_assoc(); // fetch data   

if (is_array($employee) && count($employee) > 0) {
    echo json_encode(array('error' => "Username is already taken."));
} else {
    $query2 = "
    INSERT INTO
        employee (fname, lname, uname, pass)
    VALUES
        (?, ?, ?, ?);
    ";

    $stmt2 = $db->prepare($query2);

    $stmt2->bind_param("ssss", $fname, $lname, $uname, $pass);

    if ($stmt2->execute()) {
        echo json_encode(array("result" => "success"));
    } else {
        echo json_encode(array('error' => "Incorrect password or Employee is not yet registered"));
    }
}
