<?php
// Select all product join producttype
$allpdt = "SELECT * FROM `product_types`";
$qallpdt = mysqli_query($conn, $allpdt);
?>

<div class="row mt-5">
    <!-- Add producttype -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fas fa-folder-plus"></i> เพิ่มประเภทสินค้า</h5>
            </div>

            <div class="card-body">
                <form action="" method="post"  id="formAddProductType">
                    <div class="form-group">
                        <div class="form-floating">
                            <input type="text" name="type_name" id="type_name" class="form-control" placeholder="Product type" autocomplete="off" required>
                            <label for="type_name">ชื่อประเภท</label>
                        </div>
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
        <h4><i class="fas fa-folder"></i> ประเภทสินค้าทั้งหมด</h4>
        <div class="table-responsive">
            <table class="table-sm table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col" class="text-center">จำนวนสินค้า</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($rallpdt = mysqli_fetch_array($qallpdt)) { ?>
                        <tr>
                            <td><?= $rallpdt['type_id']; ?></td>
                            <td><?= $rallpdt['type_name']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>