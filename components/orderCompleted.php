<?php
$orderID = $_GET['orderId'];
?>

<div class="d-flex flex-column justify-content-center align-items-center vh-100">
    <p id="defaultOrderId" class="d-none"><?= $orderID; ?></p>
    <img src="./static/image/shopping-cart.png" class="img-fluid" alt="Loading image" width="256">
    <h1 class="mt-5">
        <span class="display-2">กรุณารอรับเครื่องดื่ม</span>
    </h1>
    <div class="spinner-border text-primary mr-3 text-small" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>


<script>
    let isPaused = false
    let time = 0
    setInterval(() => {
        if (!isPaused) {
            time++
            const defaultOrderId = document.querySelector('#defaultOrderId').innerHTML
            $.ajax({
                url: './backend/order.php',
                type: 'post',
                data: {
                    checkStatus: defaultOrderId
                },
                dataType: 'json',
                success: (res) => {
                    if (res.status == 1) {
                        isPaused = true
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'เรียบร้อย!',
                            text: 'ขอบคุณที่อุดหนุน',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            allowEscapeKey: false,
                            allowOutsideClick: false
                        }).then(() => window.location.href = './')
                    }
                },
                error: (err) => {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'เอ๊อะ!',
                        text: 'มีบางอย่างผิดพลาด',
                        showConfirmButton: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false
                    }).then((e) => {
                        if (e.isConfirmed) {
                            window.location.href = './'
                        }
                    })
                }
            })
        }
    }, 2000)
</script>