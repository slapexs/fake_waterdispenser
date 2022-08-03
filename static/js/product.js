// Add product
$(document).ready((e) => {
  $('#formAddProduct').submit(function (e) {
    e.preventDefault();
    const form_data = new FormData(this);
    //   form_data.append('file', document.getElementById('product_image'));
    $.ajax({
      url: './backend/product.php',
      type: 'post',
      data: form_data,
      dataType: 'json',
      cache: false,
      contentType: false,
      processData: false,
      success: (res) => {
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: res.status,
          showConfirmButton: false,
          showCancelButton: false,
          timer: 2000,
          timerProgressBar: true,
        }).then(() => window.location.reload());
      },
      error: (xhr, ajaxOptions, thrownError) => {
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Error!',
          text: `${thrownError}(${xhr.status})`,
          timer: 3000,
          showConfirmButton: false,
          showCancelButton: false,
          timerProgressBar: true,
        });
      },
    });
  });
});
