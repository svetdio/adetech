<?php
require_once "../config.php";

$db = new mysqli($database_host, $database_user, $database_password, $database_schema);

$emp_id = $_POST['emp_id'];

$update_query = "
    UPDATE emp_list SET
";

$changes = array();
foreach ($_POST as $k => $v) {
    if ($k == "emp_id") continue;
    $changes[] = "$k = '$v'";
}

if (isset($_FILES['emp_image'])) {
    $item_img_name = 'img/emp_image/' . $_FILES["emp_image"]["name"];
    $target_file = dirname(__FILE__) . '\\..\\img\\emp_image\\' . $_FILES["emp_image"]["name"];
    if (!move_uploaded_file($_FILES["emp_image"]["tmp_name"], $target_file)) {
        $resp = array('result' => false, 'error' => 'Error in uploading the image.');
    }
    $changes[] = "emp_img = '$item_img_name'";
}

$update_query = $update_query . implode(", ", $changes)  . " WHERE id = '$emp_id'";

$resp = array('result' => true);

if (!$db->query($update_query)) {
    $resp = array('result' => false, 'error' => 'Error in updating the item');
}

echo json_encode($resp);
