<?php
include_once('./condb.php');

// Place order
if (isset($_POST['placeOrder'])) {
    $order = $_POST['placeOrder'];

    $ins = "INSERT INTO `orders` (`order_id`,`order_product`,`order_amount`, `order_ref_machine`, `order_price`) VALUES ('" . $order[4] . "', '" . $order[0] . "','" . $order[1] . "','" . $order[2] . "','" . $order[3] . "')";
    $qins = $conn->query($ins);
    if ($qins) {
        $res = 'inserted';
    } else {
        $res = 'not_insert';
    }
    $response = ['status' => $res];
    echo json_encode($response);
}

// Check order status
if (isset($_POST['checkStatus'])) {
    $orderId = $_POST['checkStatus'];
    $chk = "SELECT * FROM `orders` WHERE `order_id` = '" . $orderId . "' ";
    $qchk = $conn->query($chk);
    $rchk = mysqli_fetch_assoc($qchk);
    $orderStatus = $rchk['order_status'];
    $response = ['status' => $orderStatus];
    echo json_encode($response);
}

// Fetch order detail
if (isset($_POST['fetchOrderDefail'])) {
    $data = $_POST['fetchOrderDefail'];
    $fetord = "SELECT * FROM `products` WHERE `product_id` = '" . $data[1] . "' ";
    $qfetord = $conn->query($fetord);
    $rfetord = mysqli_fetch_assoc($qfetord);

    // Fet order detail
    $ord = "SELECT * FROM `orders` WHERE `order_id` = '".$data[0]."' ";
    $qord = $conn->query($ord);
    $rord = mysqli_fetch_assoc($qord);
    $resData = [$data[0], $rfetord['product_image'], $rfetord['product_name'], $rfetord['product_amount'], $rfetord['product_price'], $rord['order_status']];
    $response = ['status' => $resData];
    echo json_encode($response);
}
