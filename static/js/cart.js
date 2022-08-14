function calprice(amount, price, amountMax) {
  const btnSubmitOrder = document.querySelector('#btnSubmitOrder');
  const checkFirstIsZero = amount[0] == 0 ? true : false;
  if (!checkFirstIsZero && amount > 0 && amount != '') {
    if (amount <= amountMax) {
      let sumPrice = amount * price;
      btnSubmitOrder.innerHTML = `สั่งเครื่องดื่ม (฿${sumPrice.toLocaleString(
        'en-US'
      )})`;
    } else {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'ช้าก่อน!',
        text: 'มีของเหลือไม่เยอะขนาดนั้นหรอกนะ',
        showConfirmButton: true,
      }).then(() => {
        document.querySelector('#amount_product').value = 1;
      });
    }
    btnSubmitOrder.classList.remove('disabled');
  } else {
    btnSubmitOrder.classList.add('disabled');
  }
}

function choosePayment(state) {
  if (state != 1) {
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'ขออภัย!',
      text: 'ตู้ไม่มีระบบจ่ายด้วยตัวเลือกนี้ กรุณาเลือกจ่ายด้วยวิธีอื่น',
      //   timer: 5000,
      //   timerProgressBar: true,
      showConfirmButton: true,
      showCancelButton: false,
    });
  }
}

function submitOrder(productId, price) {
  // Check amount
  const amount = document.querySelector('#amount_product').value;
  const machineId = document.cookie.split('=');
  const orderPrice = amount * price;
  const orderId = document.querySelector('#orderId').innerHTML;
  if (amount > 0) {
    Swal.fire({
      position: 'center',
      icon: 'info',
      title: 'กำลังเตรียม',
      text: 'กรุณาจ่ายเงินเพื่อดำเนินการต่อ',
      showConfirmButton: true,
      allowOutsideClick: false,
      allowEscapeKey: false,
    }).then((e) => {
      if (e.isConfirmed) {
        const order = [productId, amount, machineId[1], orderPrice, orderId];
        $.ajax({
          url: './backend/order.php',
          type: 'post',
          data: { placeOrder: order },
          dataType: 'json',
          success: (res) => {
            setTimeout(() => {
              window.location.href = `./?page=ordercompleted&orderId=${orderId}`;
            }, 1000);
          },
          error: (err) => console.log(err),
        });
      }
    });
  }
}
