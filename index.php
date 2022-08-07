<?php
// Connect database
include_once('./backend/condb.php');
$page = $_GET['page'];
$product_type = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Metatag -->
    <!-- Primary Meta Tags -->
    <title>หิวน้ำรึเปล่า? - ถ้าหิวน้ำก็ต้องกินน้ำนะ</title>
    <meta name="title" content="หิวน้ำรึเปล่า? - ถ้าหิวน้ำก็ต้องกินน้ำนะ">
    <meta name="description" content="รู้หรือไม่ น้ำ คือส่วนประกอบหลักๆของร่างกายเลยนะถ้าหิวน้ำ ใช่แล้ว! ก็ต้องกินน้ำยังไงล่ะ">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://fakewaterdispenser.ddns.net">
    <meta property="og:title" content="หิวน้ำรึเปล่า? - ถ้าหิวน้ำก็ต้องกินน้ำนะ">
    <meta property="og:description" content="รู้หรือไม่ น้ำ คือส่วนประกอบหลักๆของร่างกายเลยนะถ้าหิวน้ำ ใช่แล้ว! ก็ต้องกินน้ำยังไงล่ะ">
    <meta property="og:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="http://fakewaterdispenser.ddns.net">
    <meta property="twitter:title" content="หิวน้ำรึเปล่า? - ถ้าหิวน้ำก็ต้องกินน้ำนะ">
    <meta property="twitter:description" content="รู้หรือไม่ น้ำ คือส่วนประกอบหลักๆของร่างกายเลยนะถ้าหิวน้ำ ใช่แล้ว! ก็ต้องกินน้ำยังไงล่ะ">
    <meta property="twitter:image" content="https://metatags.io/assets/meta-tags-16a33a6a8531e519cc0936fbba0ad904e52d35f34a46c97a2c9f6f7dd7d336f2.png">


    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- External css-->
    <link rel="stylesheet" href="./static/css/style.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>

<body>
    <div class="container <?= ($page == "" ? "align-items-center justify-content-center d-flex vh-100" : "") ?>">
        <div>
            <?php
            switch ($page) {
                case "producttype":
                    include_once('./components/productType.php');
                    break;
                case "product":
                    include_once('./components/product.php');
                    break;
                case "pickproduct":
                    include_once('./components/pickproduct.php');
                    break;
                case "cart":
                    include_once('./components/cart.php');
                    break;
                default:
                    include_once('./components/main.php');
                    break;
            }
            ?>
        </div>
    </div>


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- External js -->
    <script src="./static/js/index.js"></script>
    <script src="./static/js/productType.js"></script>
    <script src="./static/js/product.js"></script>
    <!-- Sweetalert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>