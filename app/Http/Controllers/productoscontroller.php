<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productos;
class productoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.index',['productos'=>productos::all()]);
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
        $nuevo=new productos ();
        $imagen=$request->file('img');
        $nombreimg=time().'.'.$imagen->getClientOriginalExtension();
        $destino=public_path('img/productos');
        $request->img->move($destino, $nombreimg);
        $nuevo->img=$nombreimg;
        $nuevo->nombre=$request->get("nombre");
        $nuevo->precio=$request->get("precio");
        $nuevo->stock=$request->get("stock");
        
        $nuevo->save();
    
          return redirect('/productos/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(productos $productos,$id)
    {
        return view('/productos.show',['productos'=>$productos::find($id)] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos=productos::find($id);
        return view('productos.edit',['productos'=>$productos] );
        
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
        $productos= productos::find($id);

        $productos->nombre=$request->get("nombre");
        $productos->precio=$request->get("precio");
        $productos->stock=$request->get("stock");
        if($request->file('img') !==null){
            
            $imagen=$request->file('img');
            $nombreimg=time().'.'.$imagen->getClientOriginalExtension();
            $destino=public_path('img/productos');
            $request->img->move($destino, $nombreimg);
            $productos->img=$nombreimg;
        };
        $productos->save();
  
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = productos::find($id);
        $productos->delete();
        return redirect('/productos');
    }

    
    public function getlistaProductos($listaP  = null){

        return $listaP ?? productos::all();
    }

}
