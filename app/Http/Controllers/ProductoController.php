<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
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
        // $productos = Producto::get();

        $productos = Producto::join('categorias', 'productos.categoria', '=', 'categorias.id')->get();
        //dd($productos);

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

        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
        ]);
        
        Categoria::create([
            'categoria' => $request->categoria
        ]);
        
        // Producto::create($request->all());
        $categoria_id = Categoria::where('categoria', $request->categoria)->first('id');
        // dd($categoriaQuery->id);

        Producto::create([
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
            'cantidad' => $request->cantidad,
            'categoria' => $categoria_id->id,
        ]);
     
        return redirect()->route('productos.index')->with('success','Producto createdo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        // dd($producto->nombre);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
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

        $request->validate([
            'nombre' => 'required',
            'cantidad' => 'required',
        ]);
        
        $producto->update($request->all());
    
        return redirect()->route('productos.index')->with('success','Producto editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
    
        return redirect()->route('productos.index')->with('success','Producto eliminado correctamente');
    }
}
