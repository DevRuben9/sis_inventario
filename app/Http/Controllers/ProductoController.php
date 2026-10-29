<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(){
        return view('productos.producto');
    }

    public function getProduct(){
        $productos = Producto::all();
        return response()->json(['productos' => $productos]);
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
        return response()->json(['success'=>'Producto creado exitosamente.']);
    }

    public function show(Producto $producto){
        //
    }

    public function edit(Producto $producto){
        //
    }

    public function update(Request $request, $id){
        $request->validate([
            'producto' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Producto actualizado correctamente',
            'producto' => $producto
        ]);
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
