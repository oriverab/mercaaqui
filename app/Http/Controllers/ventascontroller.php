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
        $producto = $request ->get('nombre');
        $resta = $request ->get('cantidad');
        $resta=intval($resta);  
        $sql1 = DB::select("SELECT precio from productos where nombre= '$producto'");
        $sql7 = DB::select("SELECT id from productos where nombre = '$producto'");
        $sql2 = DB::select("SELECT nombre from productos where nombre= '$producto'");
        $sql6 = DB::select("SELECT img from productos where nombre = '$producto'");
        $sql5 = DB::select("SELECT stock from productos where nombre = '$producto'");
        
        
       if($resta <= ($sql5[0]->stock)){
       $nuevoproducto = new ventas();
       $nuevoproducto->nombre=$request->get("nombre");
       $nuevoproducto->productos_id=$sql7[0]->id;
       $productos = $sql7[0]->id;
       $nuevoproducto->img=$sql6[0]->img;
       //$descuento=DB::table('productos')->where('id',$sql7)->update(array('stock' =>$sql5));
       $cantidadTabla=$sql5;
       $cantidadTabla=intval($sql5[0]->stock - $resta);
       $nuevoproducto->precio=$sql1[0]->precio;
       $nuevoproducto->cantidad=$request->get('cantidad');
       $nuevoproducto->total=$request->get('cantidad')*$sql1[0]->precio;
       $nuevoproducto->vendedor=Auth::user()->name;
       
       $descuento=DB::table('productos')->where('id',$productos)->update(array('stock' =>$cantidadTabla));
       $nuevoproducto->save();
       return redirect('/ventas');
    }else{
        echo'<script type="text/javascript">
        alert("no hay stock");
        window.location.href="/ventas";
        </script>';
    }
        
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
        $editproducto=ventas::find($id);    
        $precio=$editproducto->precio;
        $Nombre=$editproducto->Nombre;
        $productos_id=$editproducto->productos_id;
        $cantidad_actual=($editproducto->cantidad); 
        $cantidad_def=intval($request->get('cantidad')); // cantidad del input
        $sql5= DB::select("SELECT stock FROM productos WHERE id = $productos_id");
        
        if ($cantidad_def <=($sql5[0]->stock + $cantidad_actual)) {
            $sql18 = DB::select("update productos set stock = (stock + $cantidad_actual) where id = $productos_id");
            $editproducto->Cantidad=$request->get('cantidad');
            $sql19 = DB::select("update productos set stock = (stock - $cantidad_def) where id = $productos_id");
            $editproducto->total=$request->get('cantidad')*$precio;
            $editproducto->save();
            return redirect('/ventas');
        }else{
                // dd('soy la gaver');
                echo'<script>alert("No hay stock de '. $Nombre .' ");window.location.href="/ventas";</script>';
                
            }

       
    
   ##----------------------------------------------------------------------
        
       



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

    public function getlistaventas($listaVe  = null){

        return $listaVe ?? ventas::all();
    }


}
