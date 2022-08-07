<?php
// Select all product
$allpd = "SELECT * FROM `products`";
$qallpd = mysqli_query($conn, $allpd);

// Select all producttypes
$allpdt = "SELECT * FROM `product_types`";
$qallpdt = $conn->query($allpdt);
$productTypes_id = [];
$productTypes_name = [];

while ($rallpdt = mysqli_fetch_array($qallpdt)) {
    array_push($productTypes_id, $rallpdt['type_id']);
    array_push($productTypes_name, $rallpdt['type_name']);
}
?>

<div class="row mt-5">
    <!-- Add producttype -->
    <div class="col-md mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-plus"></i> เพิ่มสินค้า</h5>
            </div>

            <div class="card-body">
                <form action="" method="post" id="formAddProduct" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product type" autocomplete="off" required>
                            <label for="product_name">ชื่อสินค้า</label>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <div class="form-floating">
                            <input type="number" name="product_amount" id="product_amount" class="form-control" placeholder="Amount" min="1" required>
                            <label for="product_amount">จำนวน</label>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <div class="form-floating">
                            <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Amount" min="1" required>
                            <label for="product_price">ราคา</label>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <select name="product_type" id="product_type" class="form-select" aria-label="Default producttype">
                            <option value="0" selected hidden disabled>-- เลือกประเภทสินค้า</option>
                            <?php for ($i = 0; $i < count($productTypes_id); $i++) { ?>
                                <option value="<?= $productTypes_id[$i]; ?>"><?= $productTypes_name[$i]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="product_image" class="form-label">รูปภาพ</label>
                        <input type="file" name="product_image" id="product_image" class="form-control">
                    </div>

                    <div class="mt-2 d-grid">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <h4>All products</h4>
    <hr>

    <div class="row row-cols-2 row-cols-md-3 g-4">
        <?php while ($rallpd = mysqli_fetch_array($qallpd)) { ?>
            <div class="col">
                <div class="card">
                    <img src="./upload/<?= $rallpd['product_image']; ?>" alt="product image" class="img-card-top">
                    <div class="card-body">
                        <h5 class="card-title mb-0"><?= $rallpd['product_name']; ?></h5>
                        <p class="card-text">
                            <strong>ราคา: <?= $rallpd['product_price']; ?></strong><br>
                            <strong>เหลือ: <?= number_format($rallpd['product_amount'], 0); ?></strong><br>
                        </p>
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">หมวดหมู่: <?= $productTypes_name[$rallpd['product_type']-1]; ?></small>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>