<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendedor;
class vendedorcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('vendedor.index');
        return view('vendedor.index',['vendedor'=>vendedor::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedor.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevo=new vendedor ();
        $nuevo->nombre=$request->get("nombre");
        $nuevo->cedula=$request->get("cedula");
        $nuevo->email=$request->get("email");
        $nuevo->telefono=$request->get("telefono");

        $nuevo->save();
    
          return redirect('/vendedor/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('/vendedor.show'); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendedor=vendedor::find($id);
        return view('vendedor.edit',['vendedor'=>$vendedor] );
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
        $vendedor= vendedor::find($id);

        $vendedor->nombre=$request->get("nombre");
        $vendedor->cedula=$request->get("cedula");
        $vendedor->email=$request->get("email");
        $vendedor->telefono=$request->get("telefono");

        $vendedor->save();
  
        return redirect('/vendedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor = vendedor::find($id);
        $vendedor->delete();
        return redirect('/vendedor');
    }

    public function getlistaUsuario($listaU  = null){

        return $listaU ?? vendedor::all();
    }
  
    public function createv($request = null, $flag_test = false)
    {
        $vendedor = new Vendedor();
        if (isset($request)) {
        $vendedor = new vendedor();
        $vendedor->nombre=$request->get('nombre');
        $vendedor->cedula=$request->get('cedula');
        $vendedor->email=$request->get('email');
        $vendedor->telefono=$request->get('telefono');
        } elseif ($flag_test) {
            $vendedor -> id = 1; 
            $vendedor -> nombre = 'milton';
            $vendedor -> cedula = '1000323136';
            $vendedor -> email = 'nada@gmail.com';
            $vendedor -> telefono = '123443';
        }
        return $vendedor;
    }

    public function updateVendedorId($request, $id, $flag_test = false)
    {
        if ($request !== null) {
            $vendedorUpdt = $this->getVendedorId($id);
            $vendedorUpdt->nombre=$request->get('nombre');
            $vendedorUpdt->cedula=$request->get('cedula');
            $vendedorUpdt->email=$request->get('email');
            $vendedorUpdt->telefono=$request->get('telefono');
        }if ($flag_test) {
            $vendedorUpdt = $this->getVendedorId(null, $flag_test);
            $vendedorUpdt -> id = 1; 
            $vendedorUpdt -> nombre = 'milton';
            $vendedorUpdt -> cedula = '1000323136';
            $vendedorUpdt -> email = 'nada@gmail.com';
            $vendedorUpdt -> telefono = '123443';
        }
        return $vendedorUpdt;
    }


    public function getVendedorId($id = null, $flag_test = false)
    {
        if (isset($id)) {
            return vendedor::find($id);
        } elseif ($flag_test) {
           return $this->createv(null, $flag_test);
        }
    }
  

}
