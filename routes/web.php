<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('layouts.principal');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuario.index');

Route::get('/productos', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/productos/obtenerProductos', [ProductoController::class, 'getProduct'])->name('producto.obtenerProductos');

Route::post('/productos', [ProductoController::class, 'store'])->name('producto.store');

Route::put('/productos/{id}', [ProductoController::class, 'update'])->name('productos.update');

Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('producto.destroy');
