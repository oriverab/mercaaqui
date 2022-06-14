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
        //$imagen=$request->file('img');
        //$nombreimg=time().'.'.$imagen->getClientOriginalExtension();
        //$destino=public_path('img/productos');
        //$request->img->move($destino, $nombreimg);
        $nuevo->img=$request->get("img");
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
        $productos->img=$request->get("img");
        // if($request->file('img') !==null){
            
        //     $imagen=$request->file('img');
        //     $nombreimg=time().'.'.$imagen->getClientOriginalExtension();
        //     $destino=public_path('img/productos');
        //     $request->img->move($destino, $nombreimg);
        //     $productos->img=$nombreimg;
        // };
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


    public function createP($request = null, $flag_test = false)
    {
        $productos = new productos();
        if (isset($request)) {
            $productos->nombre = $request->get('nombre');
            $productos->precio = $request->get('precio');
            $productos->tipo = $request->get('stock');
            $productos->imagen = $request->get('img');
        } elseif ($flag_test) {
            $productos->id = 1;
            $productos->nombre = 'awita';
            $productos->precio = '2000';
            $productos->stock = '150';
        }
        return $productos;
    }

    /**
     * Return the product from its id or generates one
     * @param $id of the Product
     * @param $flag_test
     * @return Product $product
     */
    public function getProductosId($id = null, $flag_test = false)
    {
        if (isset($id)) {
            return productos::find($id);
        } elseif ($flag_test) {
           return $this->createP(null, $flag_test);
        }
    }

    /**
     * Updates the product from the request or generates one
     * @param \Illuminate\Http\Request  $request
     * @param $id of the Product
     * @param $flag_test
     * @return Product $product
     */
    public function updateProductosId($request, $id, $flag_test = false)
    {
        if ($request !== null) {
            $productosUpdt = $this->getProductosId($id);
            $productosUpdt->nombre = $request->get('nombre');
            $productosUpdt->precio = $request->get('precio');
            $productosUpdt->tipo = $request->get('stock');
            $productosUpdt->imagen = $request->get('img');
        }elseif ($flag_test) {
            $productoUpdt = $this->getProductosId(null, $flag_test);
            $productosUpdt = $this->getProductosId(null, $flag_test);
            $productosUpdt->nombre = 'arroz';
            $productosUpdt->precio = '2000';
            $productosUpdt->stock = '200';
        }
        return $productosUpdt;
    }

}
