<?php
include_once('./condb.php');

// Insert producttype
if (isset($_POST['insert'])) {
    $data = $_POST['insert'];
    $ins = "INSERT INTO `product_types` (`type_name`) VALUES ('" . $data . "')";
    $qins = $conn->query($ins);
    if ($qins) {
        $res = 'inserted';
    } else {
        $res = 'not_inserted';
    }

    $response = ['status' => $res];
    echo json_encode($response);
}
