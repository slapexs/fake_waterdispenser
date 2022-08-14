<?php
// Fetch all machine number
$findmch = "SELECT DISTINCT `order_ref_machine` FROM `orders`";
$qfindmch = $conn->query($findmch);
$machineId = [];
while ($rfindmch = mysqli_fetch_array($qfindmch)) {
    array_push($machineId, $rfindmch['order_ref_machine']);
}
?>

<nav class="navbar navbar-expand-lg bg-light rounded-bottom shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="./?page=backend">Backend</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ออเดอร์
                    </a>
                    <ul class="dropdown-menu">
                        <?php foreach ($machineId as $id) { ?>
                            <li><a class="dropdown-item" href="./?page=backend&machine=<?= $id; ?>">ตู้ที่ <?= $id; ?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'producttype' ? 'text-info' : ''); ?>" href="./?page=producttype">หมวดหมู่</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page == 'product' ? 'text-info' : ''); ?>" href="./?page=product">สินค้า</a>
                </li>
            </ul>
        </div>
    </div>
</nav>