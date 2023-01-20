<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);


$emp_name = $_POST['emp_name'];
$gender = $_POST['gender'];
$bday = $_POST['bday'];
$natl = $_POST['natl'];
$c_status = $_POST['c_status'];
$dept = $_POST['dept'];
$desg = $_POST['desg'];
$emp_status = $_POST['emp_status'];
$tax_status = $_POST['tax_status'];
$emp_img_name = 'img/emp_image/' . $_FILES["emp_image"]["name"];

$inventory_query = "
INSERT INTO emp_list (emp_name, gender, bday, natl, c_status, dept, desg, emp_status, emp_img, tax_status)
VALUES ('$emp_name', '$gender', '$bday', '$natl', '$c_status', '$dept', '$desg', '$emp_status', '$emp_img_name', '$tax_status')";

$resp = "";
if ($db->query($inventory_query)) {
    $target_file = dirname(__FILE__) . '\\..\\img\\emp_image\\' . $_FILES["emp_image"]["name"];
    if (move_uploaded_file($_FILES["emp_image"]["tmp_name"], $target_file)) {
        $resp = array('result' => true);
    } else {
        $resp = array('result' => false, 'error' => 'Error in uploading the image.');
    }
} else {
    $resp = array('result' => false, 'error' => 'Error in saving the item');
}

echo json_encode($resp);
