@extends('layouts.principal')
@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Ingresar Usuario
</button>

<div class="card p-3 mt-5">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Producto</th>
        <th scope="col">Categoria</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($productos as $prod)
        <tr>
          <th scope="row">{{ $prod->idproducto }}</th>
          <td>{{ $prod->producto }}</td>
          <td>{{ $prod->categoria }}</td>
          <td>{{ $prod->precio }}</td>
          <td>{{ $prod->stock }}</td>
          <td>
            <button class="btn btn-warning">Editar</button>
            <button data-id="{{ $prod->idproducto }}" class="btn btn-danger eliminar">Eliminar</button>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir Usuario</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form class="productosForm">
          @csrf
          <div class="mb-3">
            <label class="form-label">Producto:</label>
            <input type="text" name="producto" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Categoría:</label>
              <input type="text" name="categoria" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Precio:</label>
              <input type="number" step="0.01" name="precio" class="form-control" required>
          </div>
          <div class="mb-3">
              <label class="form-label">Stock:</label>
              <input type="number" name="stock" class="form-control" required>
          </div>
        
          <div class="d-flex justify-content-end gap-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection