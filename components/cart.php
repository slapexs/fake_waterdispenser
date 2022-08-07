<?php
$product_id = $_GET['pdid'];
$findpd = "SELECT * FROM products WHERE product_id = '" . $product_id . "' ";
$qfindpd = $conn->query($findpd);
$rfindpd = mysqli_fetch_assoc($qfindpd);

// List payments
$payments = [
    ["cash.png", "เงินสด"],
    ["debit-cards.png", "บัตรเครดิต"],
    ["paypal.png", "Paypal"],
    ["ethereum.png", "Crypto"],
    ["qr-code.png", "QR code"],
    ["nomoney.png", "ติดไว้ก่อน"]
];
?>
<div class="mt-5">
    <a href="./" class="btn btn-lg btn-light shadow" role="button"><i class="fas fa-arrow-left"></i> กลับ</a>
    <div class="d-flex align-items-center justify-content-center">
        <img src="<?= ($rfindpd['product_image'] != "" ? './upload/' + $rfindpd['product_image'] : './static/image/noimage.png') ?>" alt="product" class="img-fluid" width="128">
    </div>
    <h1 class="text-center display-1"><?= $rfindpd['product_name'] ?></h1>
    <h4 class="text-center text-muted">
        <strong>ราคา: </strong> <span class="price-color">฿<?= $rfindpd['product_price']; ?></span>
        <strong>คงเหลือ: </strong> <span class=""><?= $rfindpd['product_amount']; ?></span>
    </h4>

    <hr>

    <div class="bg-light rounded p-4">
        <h3>ระบุจำนวนที่ต้องการ</h3>
        <input type="number" name="amount_product" id="amount_product" class="form-control form-control-lg" min="1" max="<?= $rfindpd['product_amount']; ?>" value="1">
    </div>

    <div class="bg-light rounded p-4 mt-3">
        <h3>เลือกวิธีจ่ายเงิน</h3>

        <div class="row row-cols-2 row-cols-md-4 g-4 text-center">
            <?php for ($i = 0; $i < count($payments); $i++) { ?>
                <div class="col">
                    <div class="rounded border border-2 p-3">
                        <img src="./static/image/<?= $payments[$i][0]; ?>" class="img-fluid mb-3" width="64" alt="payment">
                        <h4><?= $payments[$i][1]; ?></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <button class="btn btn-primary btn-lg rounded-pill" type="button">สั่งเครื่องดื่ม (฿15)</button>
    </div>
</div>