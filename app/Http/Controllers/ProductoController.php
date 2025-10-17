<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $productos = Producto::all(); 
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
    'nombre' => 'required|string|max:200',
    'descripcion' => 'nullable|string',
    'precio' => 'required|numeric|min:0',
    'stock' => 'required|integer|min:0',
    'categoria_id' => 'nullable|exists:categorias,id',
    'codigo_barras' => 'required|string|max:50|unique:productos,codigo_barras',
    'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    'activo' => 'boolean']);
      Producto::create($request->all()); 
        return redirect()->route('productos.index') 
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
         return view('productos.edit', compact('producto')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
         $request->validate([
    'nombre' => 'required|string|max:200',
    'descripcion' => 'nullable|string',
    'precio' => 'required|numeric|min:0',
    'stock' => 'required|integer|min:0',
    'categoria_id' => 'nullable|exists:categorias,id',
    'codigo_barras' => 'required|string|max:50|unique:productos,codigo_barras',
    'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    'activo' => 'boolean']);
      $producto->update($request->all());
        return redirect()->route('productos.index') 
            ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
         $producto->delete(); 
        return redirect()->route('productos.index') 
            ->with('success', 'Producto eliminado exitosamente'); 
    }
}
