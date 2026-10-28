$(document).on('click','.eliminar',function(e){
  e.preventDefault();
  const id = $(this).data('id');
  $.ajax({
    url: '/productos/' + id,
    type: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
      if (response.success) {            
        Swal.fire({
          title: 'Exitoso!',
          text: response.message,
          icon: 'success',
          confirmButtonText: 'Aceptar'
        });
      }
    },
    error: function(xhr) {
      Swal.fire({
        title: 'Error!',
        text: 'Ocurrió un error al intentar eliminar el producto.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
      console.log(xhr.responseText);
    }
  });
});

$(document).on('submit', '.productosForm', function(e){
  e.preventDefault();
  const form = $(this);
  const data = form.serialize();

  $.ajax({
    url: '/productos',
    type: 'post',
    data: data,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(res) {
      Swal.fire({
        title: 'Exitoso!',
        text: res.message,
        icon: 'success',
        confirmButtonText: 'Aceptar'
      });
    },
    error: function(xhr) {
      Swal.fire({
        title: 'Error!',
        text: 'Ocurrió un error al intentar guardar el producto.',
        icon: 'error',
        confirmButtonText: 'Aceptar'
      });
    }
  });
});

