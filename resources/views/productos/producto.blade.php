@extends('layouts.principal')
@section('content')

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Ingresar Usuario
</button>

<div class="card p-3 mt-5">
  <table class="table table-hover productosTable">
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
     
    </tbody>
  </table>
</div>

@include('productos.formulario')

@endsection

@push('scripts')
    @vite(['resources/js/productos.js'])
@endpush