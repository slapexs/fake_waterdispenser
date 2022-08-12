<?php
include_once('./condb.php');

// Place order
if (isset($_POST['placeOrder'])) {
    $order = $_POST['placeOrder'];
    
    $ins = "INSERT INTO `orders` (`order_product`,`order_amount`, `order_ref_machine`, `order_price`) VALUES ('" . $order[0] . "','" . $order[1] . "','" . $order[2] . "','" . $order[3] . "')";
    $qins = $conn->query($ins);
    if($qins){
        $res = 'inserted';
    }else{
        $res = 'not_insert';
    }
    $response = ['status' => $res];
    echo json_encode($response);
}
