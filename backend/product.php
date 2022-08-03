<?php
include_once('./condb.php');

// All new product
$product_name = $_POST['product_name'];
$product_type = $_POST['product_type'];
$product_amount = $_POST['product_amount'];
$product_price = $_POST['product_price'];
$product_image_name  = $_FILES['product_image']['name'];

// Function random string
function generateRandomString($length)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Change file name
$temp = explode(".", $_FILES["product_image"]["name"]);
$newfilename = generateRandomString(10) . '.' . end($temp);

// Path upload
$location = '../upload/' . $newfilename;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);
$imageFileType = strtolower($imageFileType);
$valid_extensions = array("jpg", "jpeg", "png");

/* Check file extension */
if (in_array(strtolower($imageFileType), $valid_extensions)) {
    /* Upload file */
    if (move_uploaded_file($_FILES['product_image']['tmp_name'], $location)) {
        $ins = "INSERT INTO `products` (`product_name`, `product_amount`, `product_price`, `product_image`, `product_type`) VALUES ('" . $product_name . "', '" . $product_amount . "', '" . $product_price . "', '" . $newfilename . "', '" . $product_type . "')";
        $qins = $conn->query($ins);
        if ($qins) {
            $res = "inserted";
        } else {
            $res = "not_inserted";
        }
    }
} else {
    $res = "error";
}
$response = ['status' => $res];
echo json_encode($response);
