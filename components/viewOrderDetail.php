<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasViewOrderDetail" aria-labelledby="offcanvasViewOrderDetailLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasViewOrderDetailLabel">ออเดอร์</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p id="fetchOrderId" class="d-none"></p>
        <p id="fetchProductId" class="d-none"></p>
        <div class="d-flex flex-column">
            <img src="" id="fetchOrderImage" class="img-fluid mx-auto" width="128" alt="product image">
            <h5 id="fetchOrderName" class="mt-2"></h5>
            <p><strong>จำนวน: </strong><span id="fetchOrderAmount"></span></p>
            <p><strong>ราคารวม: </strong><span id="fetchOrderPrice"></span></p>
            <p><strong>สถานะ: </strong><span id="fetchOrderStatus"></span></p>
        </div>
        <d class="d-grid">
            <button class="btn btn-success d-none" type="button" id="btnChangeOrderStatus" onclick="changeStatusOrder()">
                ออเดอร์เรียบร้อย
            </button>
        </d>
    </div>
</div>