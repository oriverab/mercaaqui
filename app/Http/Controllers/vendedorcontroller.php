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
    public function show(vendedor $vendedor,$id)
    {
        return view('/vendedor.show',['vendedor'=>$vendedor::find($id)] ); 

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
}
