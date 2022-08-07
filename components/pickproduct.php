<?php
// Product type
$pick_pdt = "SELECT * FROM `product_types` WHERE `type_id` = '" . $product_type . "'";
$qpick_pdt = $conn->query($pick_pdt);
$rpick_pdt = mysqli_fetch_assoc($qpick_pdt);

// All product
$pick_pd = "SELECT * FROM products WHERE product_type = '".$product_type."'";
$qpick_pd = $conn->query($pick_pd);
?>

<div class="mt-5">
    <div class="row d-flex align-items-center">
        <div class="col">
            <a href="./" class="btn btn-lg btn-light shadow" role="button"><i class="fas fa-arrow-left"></i> กลับ</a>
        </div>

        <div class="col-auto">
            <h1 class="display-3"><?= $rpick_pdt['type_name']; ?></h1>
        </div>
    </div>
    <hr>

    <!-- All product in product type -->
    <div class="row row-cols-2 row-cols-md-3 g-4">
        <?php while($rpick_pd = mysqli_fetch_array($qpick_pd)){ ?>
            <div class="col">
                <a href="#" class="text-decoration-none">
                    <div class="card text-dark">
                        <img src="<?= ($rpick_pd['product_image'] != "" ? './upload/' + $rpick_pd['product_image'] : "./static/image/noimage.png"); ?>" class="card-img-top" alt="product">
                        <div class="card-body">
                            <h4 class="card-title"><?= $rpick_pd['product_name']; ?></h4>
                            <h5 class="card-text mb-0">ราคา: <span class="price-color">฿<?= $rpick_pd['product_price']; ?></span></h5>
                            <p class="card-text">
                                <strong>คงเหลือ: <?= $rpick_pd['product_amount']; ?></strong>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>