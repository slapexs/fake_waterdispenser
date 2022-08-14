function fetchOrderDetail(orderId, product) {
  $.ajax({
    url: './backend/order.php',
    type: 'post',
    data: { fetchOrderDefail: [orderId, product] },
    dataType: 'json',
    success: (res) => {
      // btn change status order display control
      if (res.status[5] == 0) {
        document
          .querySelector('#btnChangeOrderStatus')
          .classList.remove('d-none');
      }
      const orderstatusView = [
        '<span class="badge bg-info">Pending</span>',
        '<span class="badge bg-success">Finished</span>',
      ];
      console.log(res.status);
      document.querySelector('#fetchOrderId').innerHTML = res.status[0];
      document.querySelector(
        '#fetchOrderImage'
      ).src = `./upload/${res.status[1]}`;
      document.querySelector('#fetchOrderName').innerHTML = res.status[2];
      document.querySelector('#fetchOrderAmount').innerHTML = res.status[3];
      document.querySelector('#fetchOrderPrice').innerHTML = res.status[4];
      document.querySelector('#fetchProductId').innerHTML = res.status[6];
      document.querySelector('#fetchOrderStatus').innerHTML =
        orderstatusView[res.status[5]];
    },
    error: (err) => {
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'เอ๊อะ!',
        text: `มีบางอย่างผิดพลาด ${err}`,
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false,
      }).then(() => window.location.reload());
    },
  });
}

function changeStatusOrder() {
  const orderId = document.querySelector('#fetchOrderId').innerHTML;
  const orderProductAmount =
    document.querySelector('#fetchOrderAmount').innerHTML;
  const productId = document.querySelector('#fetchProductId').innerHTML;
  $.ajax({
    url: './backend/order.php',
    type: 'post',
    data: { changeStatusOrder: [1, orderId, orderProductAmount, productId] },
    dataType: 'json',
    success: (res) => {
      if (res.status == 'updated') {
        Swal.fire({
          position: 'center',
          title: 'เย้!',
          text: 'ปิดออเดอร์เรียบร้อย',
          icon: 'success',
          timer: 2000,
          timerProgressBar: true,
          showConfirmButton: false,
        }).then(() => window.location.reload());
      } else {
        Swal.fire({
          position: 'center',
          title: 'เอ๊อะ!',
          text: 'ปิดออเดอร์ไม่สำเร็จ',
          icon: 'error',
          timer: 2000,
          timerProgressBar: true,
          showConfirmButton: false,
        }).then(() => window.location.reload());
      }
    },
    error: (err) => console.log(err),
  });
}
