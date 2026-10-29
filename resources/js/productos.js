$(function(){
  cargarProductos();
});
function cargarProductos(){
  $.ajax({
    url: '/productos/obtenerProductos',
    method: 'GET',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }).
  done((res)=>{
    // console.log(res.productos);
    let productos = res.productos;
    let html = '';
    productos.forEach(producto => {
      html += `<tr>
        <td>${producto.idproducto}</td>
        <td>${producto.producto}</td>
        <td>${producto.categoria}</td>
        <td>${producto.precio}</td>
        <td>${producto.stock}</td>
        <td>
          <button class="btn btn-danger eliminar" data-id="${producto.idproducto}">Eliminar</button>
          <button class="btn btn-primary editar" 
              data-id="${producto.idproducto}"
              data-producto="${producto.producto}"
              data-categoria="${producto.categoria}"
              data-precio="${producto.precio}"
              data-stock="${producto.stock}"
              data-bs-toggle="modal" 
              data-bs-target="#staticBackdrop">Editar</button>
        </td>
        </tr>`;
    });
    $('.productosTable tbody').html(html);
  });
}

$(document).on('click','.eliminar',function(e){
  e.preventDefault();
  let id = $(this).data('id');
  $.ajax({
    url: `/productos/${id}`,
    method: 'DELETE',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }).
  done((res)=>{
    console.log(res);
    cargarProductos();
  });

});

$(function(){
  cargarProductos();

  // 1. Cuando hacen clic en el botón de Editar de la tabla
  $(document).on('click', '.editar', function() {
    let id = $(this).data('id');
    let producto = $(this).data('producto');
    let categoria = $(this).data('categoria');
    let precio = $(this).data('precio');
    let stock = $(this).data('stock');

    // Cambiar textos y rellenar el formulario con los datos
    $('#staticBackdropLabel').text('Editar Producto');
    $('#idproducto').val(id);
    $('#input[name="producto"], #producto').val(producto); // Asignando valores
    $('#categoria').val(categoria);
    $('#precio').val(precio);
    $('#stock').val(stock);
  });

  $(document).on('click', '[data-bs-target="#staticBackdrop"]', function() {
    if (!$(this).hasClass('editar')) {
      $('#staticBackdropLabel').text('Añadir Producto');
      $('.productosForm')[0].reset();
      $('#idproducto').val(''); // Limpiamos el ID oculto
    }
  });
});

function mensajeAlert(titulo, texto,icono){
  Swal.fire({
    title: titulo,
    text: texto,
    icon: icono
  });
}

$(document).on('submit', '.productosForm', function(e) {
    e.preventDefault();
    let form = $(".productosForm").serialize();
    let id = $('#idproducto').val();
    
    let url = id ? `/productos/${id}` : '/productos';
    let method = id ? 'PUT' : 'POST';

    $.ajax({
      url: url,
      method: method,
      data: form,
      success: function(res) {
        if(res.success) {
          cargarProductos();

          form[0].reset();
          $('#idproducto').val('');

          let modalEl = document.getElementById('staticBackdrop');
          let modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
          modal.hide();

          console.log(res.message);
        }
      },
      error: function(xhr) {
        console.error("Error al procesar la solicitud:", xhr.responseText);
        alert("Ocurrió un error. Revisa los campos o la consola.");
      }
    });
  });
