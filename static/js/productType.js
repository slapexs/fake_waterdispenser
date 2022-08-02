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
      console.log(res);
    },
    error: (e) => console.log(e),
  });
});
