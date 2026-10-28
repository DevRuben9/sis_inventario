<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(){
        $productos = Producto::all();
        return view('productos.producto', compact('productos'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'producto' => 'required',
            'categoria' => 'required',
            'precio' => 'required',
            'stock' => 'required'
        ]);

        Producto::create($request->all());
        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto){
        //
    }

    public function edit(Producto $producto){
        //
    }

    public function update(Request $request, Producto $producto){
        //
    }

    public function destroy($producto){
        $prod = Producto::where('idproducto', $producto)->firstOrFail();
        $prod->delete();

        return response()->json([
            'success' => true,
            'message' => 'Producto eliminado exitosamente'
        ]);
    }
}
