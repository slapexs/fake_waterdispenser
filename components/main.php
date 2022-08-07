<?php
$product_type = "SELECT * FROM `product_types`";
$qproduct_type = $conn->query($product_type);
?>

<h1 class="text-center display-4 mb-5">กรุณาเลือกประเภทสินค้า</h1>
<section class="row mx-auto">
    <?php while ($rproduct_type = mysqli_fetch_array($qproduct_type)) { ?>
        <a href="?page=pickproduct&type=<?= $rproduct_type['type_id']; ?>" class="col-md-6 text-center my-3 text-decoration-none text-dark">
            <div>
                <div class="p-4 border rounded border-2">
                    <img src="<?= ($rproduct_type['type_link_icon'] != null ? $rproduct_type['type_link_icon'] : './static/image/noimage.png') ?>" alt="product type" class="img-fluid mb-2" width="64">
                    <h3><?= $rproduct_type['type_name']; ?></h3>
                </div>
            </div>
        </a>
    <?php
        $couter++;
    } ?>
</section>