$(document).on('click','.productosForm',function(e){
  e.preventDefault();
  form = $(this).serialize();
  $.ajax({
    url: '/productos',
    method: 'POST',
    data: form,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }).
  done((res) => {
    console.log(res);
  });
});