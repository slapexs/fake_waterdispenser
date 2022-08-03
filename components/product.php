<?php
// Select all product
$allpd = "SELECT * FROM `products`";
$qallpd = mysqli_query($conn, $allpd);

// Select all producttypes
$allpdt = "SELECT * FROM `product_types`";
$qallpdt = $conn->query($allpdt);
$productTypes_id = [];
$productTypes_name = [];

while($rallpdt = mysqli_fetch_array($qallpdt)){
    array_push($productTypes_id, $rallpdt['type_id']);
    array_push($productTypes_name, $rallpdt['type_name']);
}
?>

<div class="row mt-5">
    <!-- Add producttype -->
    <div class="col-md-4">
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
                            <?php for ($i=0; $i<count($productTypes_id); $i++) { ?>
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

    <!-- List producttypes -->
    <div class="col-md-8">
        <h4><i class="fas fa-boxes-packing"></i> สินค้าทั้งหมด</h4>
        <div class="table-responsive">
            <table class="table-sm table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col" class="text-center">จำนวนสินค้า</th>
                        <th scope="col" class="text-center">ประเภทสินค้า</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($rallpd = mysqli_fetch_array($qallpd)) { ?>
                        <tr>
                            <td class="text-center"><?= $rallpd['product_id']; ?></td>
                            <td><?= $rallpd['product_name']; ?></td>
                            <td class="text-center"><?= $rallpd['product_amount']; ?></td>
                            <td class="text-center"><?= $productTypes_name[$rallpd['product_type']-1]; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>