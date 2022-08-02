// Add new producttype
$('#formAddProductType').submit((e) => {
  e.preventDefault();
  const producType = $('#type_name').val();

  $.ajax({
    url: './backend/productType.php',
    type: 'post',
    data: { insert: producType },
    dataType: 'json',
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
