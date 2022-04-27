<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ventas;
use Illuminate\Support\Facades\Auth;


class ventascontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

       $total = DB::select("SELECT cantidad*precio as precio_total FROM ventas");
       
        return view('ventas.index',['ventas'=>ventas::all(),'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $sql = DB::select("SELECT * FROM productos "); 
        $sql1 = DB::select("SELECT * FROM vendedors "); 
       
        return view('ventas.create',['productos'=>$sql ,'vendedors'=>$sql1,]);
    
       
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevo2=$request->get("nombre");
        $nuevo1=$request->get("cantidad");
        $nuevo1=intval($nuevo1) ;
        
        $sql3 = DB::select("SELECT precio FROM productos WHERE nombre='$nuevo2' ");
        $consultaid = DB::select("SELECT id FROM productos WHERE nombre='$nuevo2' ");
        $consultaimg = DB::select("SELECT img FROM productos WHERE nombre='$nuevo2' ");
      
              
            $nuevo=new ventas ();
            $nuevo->nombre=$request->get("nombre");
            $nuevo->productos_id=$consultaid[0]->id;
            $producto=$consultaid[0]->id;
            $nuevo->img=$consultaimg[0]->img;
            $cantidadtabla=DB::select("SELECT stock FROM productos WHERE id= '$producto' ");
            $cantidadtabla=intval($cantidadtabla[0]->stock - $nuevo1);
            $nuevo->precio=$sql3[0]->precio;
            $nuevo->total=$sql3[0]->precio*$request->get('cantidad');
            $nuevo->cantidad=$request->get("cantidad");
            $nuevo->vendedor= Auth::user()->name;
            $descuento=DB::table('productos')->where('id',$producto)->update(array('stock' =>$cantidadtabla));
           
            $nuevo->save();
    
            return redirect('/ventas/');
        
    }
       
 
    




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ventas $ventas,$id)
    {
        return view('/ventas.show',['ventas'=>$ventas::find($id)] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventas=ventas::find($id);
        $sql = DB::select("SELECT * FROM productos "); 
        $sql1 = DB::select("SELECT * FROM vendedors "); 
        
        return view('ventas.edit',['ventas'=>$ventas,'productos'=>$sql ,'vendedors'=>$sql1 ]);

        // $ventas=ventas::find($id);
        // return view('ventas.edit',['ventas'=>$ventas] );
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
        $nuevo2=$request->get("nombre");
        $nuevo1=$request->get("cantidad");
        $nuevo1=intval($nuevo1) ;
        
        $sql3 = DB::select("SELECT precio FROM productos WHERE nombre='$nuevo2' ");
        $consultaid = DB::select("SELECT id FROM productos WHERE nombre='$nuevo2' ");
        $consultaimg = DB::select("SELECT img FROM productos WHERE nombre='$nuevo2' ");
      

        $nuevo2=$request->get("nombre");
        $sql3 = DB::select("SELECT precio FROM productos WHERE nombre='$nuevo2' ");
        $ventas= ventas::find($id);
        $ventas->nombre=$request->get("nombre");
        $ventas->productos_id= $producto=$consultaid[0]->id;
        $producto=$consultaid[0]->id;
        $ventas->img=$consultaimg[0]->img;
        $cantidadtabla=DB::select("SELECT stock FROM productos WHERE id= '$producto' ");
        $cantidadtabla=intval($cantidadtabla[0]->stock - $nuevo1);
        $ventas->precio=$sql3[0]->precio;
        $ventas->total=$sql3[0]->precio*$request->get('cantidad');
        $ventas->cantidad=$request->get("cantidad");
        $ventas->vendedor= Auth::user()->name;
        $descuento=DB::table('productos')->where('id',$producto)->update(array('stock' =>$cantidadtabla));
        $ventas->save();
  
        return redirect('/ventas');

     
    }
     

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventas = ventas::find($id);
        $ventas->delete();
        return redirect('/ventas');
    }


}
