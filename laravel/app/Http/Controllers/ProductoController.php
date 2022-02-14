<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Facades\Storage;
use App\Producto;
use App\Ciudad;
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

        $productos = Producto::with('ciudades')->get();

        return response()->json($productos,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $ciudades = Ciudad::pluck('nombre','id');

        return view('producto.create', compact('producto','ciudades'));
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

        $ciudadArr = [];
        foreach($request->input('ciudades') as $c){
            if(!empty($c)){
                 array_push($ciudadArr,$c);
            }
        }

        if( !empty($ciudadArr) ){
            $producto->ciudades()->sync($ciudadArr);
        }

        return response()->json($producto,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        $coordenadas = [];

        foreach ($producto->ciudades as $ciudad){
            array_push($coordenadas,['latitud'=>$ciudad->latitud,'longitud'=>$ciudad->longitud]);
        }

        //$coordenadas = json_encode($coordenadas);


        return view('producto.show', compact('producto','coordenadas'));
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
        $ciudades = Ciudad::pluck('nombre','id');
        $cIds = [];

        foreach ($producto->ciudades as $ciudad){
            array_push($cIds,$ciudad->id);
        }


        return view('producto.edit',compact('producto','ciudades','cIds'));
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
       // return response()->json($request,200);
        $producto = Producto::findOrFail($id);

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



        $ciudadArr = [];
        foreach($request->input('ciudades') as $c){
            if(!empty($c)){
                array_push($ciudadArr,$c);
            }

        }

        if( !empty($ciudadArr) ){
            $producto->ciudades()->sync($ciudadArr);
        }



        return response()->json($producto,200);
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
