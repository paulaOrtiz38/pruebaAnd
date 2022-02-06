<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        /*$productos = DB::table('productos')
                     ->select('productos.id','productos.nombre','productos.precio','productos.observaciones','productos.cantidad','productos.estado','productos.imagen')
                     ->where('nombre','LIKE','%'.$texto.'%')
                     ->orWhere('observaciones','LIKE','%'.$texto.'%')
                     ->orderBy('nombre','asc')
                     ->paginate(10);*/
                     $productos = Producto::with('ciudades')->get();
        return view('producto.index',compact('productos','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;

        if($request->hasFile('imagen')){
            $destinoPath = 'images/features/';
            $file = $request->file('imagen');
            $nombrefile = time().'-'.$file->getClientOriginalName();
            $subir = $request->file('imagen')->move($destinoPath,$nombrefile);
            $producto->imagen = $destinoPath.$nombrefile;
        }

        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->observaciones = $request->input('observaciones');
        $producto->cantidad = $request->input('cantidad');
        $producto->estado = $request->input('estado');

        $producto->save();

        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('producto.edit',compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto =Producto::findOrFail($id);

        if($request->hasFile('imagen')){
            $destinoPath = 'images/features/';
            $file = $request->file('imagen');
            $nombrefile = time().'-'.$file->getClientOriginalName();
            $subir = $request->file('imagen')->move($destinoPath,$nombrefile);
            $nombre = $destinoPath.$nombrefile;
            $producto->imagen = $destinoPath.$nombrefile;
        }
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->observaciones = $request->input('observaciones');
        $producto->cantidad = $request->input('cantidad');
        $producto->estado = $request->input('estado');


        $producto->save();

       return redirect(route('producto.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect(route('producto.index'));
    }
}
