<?php
include_once('navbar.php');
include_once('viewOrderDetail.php');
$machineId = $_GET['machine'];

// Fetch all order
$orders = "SELECT * FROM `orders` WHERE `order_ref_machine` = '" . $machineId . "' ";
$qorders = $conn->query($orders);
$couterOrder = 1;

$orderstatus = ['<span class="badge bg-info">Pending</span>', '<span class="badge bg-success">Finished</span>'];
?>

<div class="mt-3">
    <h3><i class="fas fa-hashtag"></i> ออเดอร์ตู้ที่ <?= $machineId; ?></h3>
    <table class="table table-sm table-bordered table-responsive">
        <thead class="table-dark">
            <tr class="text-center">
                <th>#</th>
                <th>สินค้า</th>
                <th>จำนวน</th>
                <th>ราคารวม</th>
                <th>สถานะ</th>
                <th>ตัวเลือก</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($rorder = mysqli_fetch_array($qorders)) {
                // Fetch product name
                $pdname = "SELECT * FROM `products` WHERE `product_id` = '" . $rorder['order_product'] . "' ";
                $qpdname = $conn->query($pdname);
                $rpdname = mysqli_fetch_assoc($qpdname);
            ?>
                <tr class="align-middle">
                    <td class="text-center"><?= $couterOrder; ?></td>
                    <td><?= $rpdname['product_name']; ?></td>
                    <td class="text-center"><?= $rorder['order_amount']; ?></td>
                    <td><?= $rorder['order_price']; ?></td>
                    <td class="text-center"><?= $orderstatus[$rorder['order_status']]; ?></td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasViewOrderDetail" aria-controls="offcanvasViewOrderDetail" onclick="fetchOrderDetail('<?= $rorder['order_id']; ?>', <?= $rorder['order_product']; ?>)"><i class="fas fa-search"></i></button>
                    </td>
                </tr>
            <?php
                $couterOrder++;
            } ?>
        </tbody>
    </table>
</div>