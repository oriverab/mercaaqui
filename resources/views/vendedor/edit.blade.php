@extends('layouts.estructura')
@section('content')
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://us.123rf.com/450wm/stylephotographs/stylephotographs1407/stylephotographs140700013/29682805-feliz-equipo-de-personal-con-los-hombres-y-las-mujeres-en-un-supermercado.jpg?ver=6" class="img-fluid">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-6 offset-xl-1">
     
      <form action="/vendedor/{{$vendedor->id}}" method="POST"> 
      @method('put')
      @csrf

            <div class="divider d-flex align-text-center my-4">
               <h1 class="text-center" fw-bold mx-3 mb-0> FORMULARIO PERSONAS</h1>     
             
          </div>
         
          <div class="form-outline mb-2">
          <label for="inputEmail3">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$vendedor->nombre}}" placeholder="Ingresar Nombre">  
    <label for="inputEmail3">Cedula</label>
    <input type="text" class="form-control" id="cedula" name="cedula" value="{{$vendedor->cedula}}" placeholder="Ingresar Cedula">
    <label for="inputEmail3" >Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{$vendedor->email}}" placeholder="Ingresar Email">
    <label for="inputEmail3">Telefono</label>
      <input type="text" class="form-control" id="telefono" name="telefono"  value="{{$vendedor->telefono}}"placeholder="Ingresar Telefono">          
            </div>     
              <div class="text-center text-lg-start mt-4 pt-2">
           
               <button type="submit" name="Enviar"  class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Enviar</button>
          </div>
        </form>
        <a href="/vendedor/"><img src="https://cdn-icons-png.flaticon.com/512/61/61022.png" width="20" height="20"></button></a>
      </div>
    </div>
  </div>
</section>
@endsection

