@extends('layouts.estructura')
@section('content')
  <section class="vh-100 ">
  <div class="container-fluid h-custom " >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{asset('img/productos/' .$productos->img)}}" class="img-fluid" width="500px" height="150px"  class="bg-transparent">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-6 offset-xl-1">
     
      <form action="/productos/{{$productos->id}}" method="POST" enctype="multipart/form-data"> 
@csrf     
@method('put')

            <div class="divider d-flex align-text-center my-4">
               <h1 class="text-center" fw-bold mx-3 mb-0> FORMULARIO PRODUCTOS</h1>     
             
          </div>
         
          <div class="form-outline mb-2">
          <label for="inputEmail3">Nombre</label>    
    <input type="text" class="form-control" name="nombre" value="{{$productos->nombre}}" placeholder="Ingresar Nombre">  
    <label for="inputEmail3">precio del producto</label>
    <input type="text" class="form-control" name="precio" value="{{$productos->precio}}" placeholder="Ingresar precio">
    <label for="inputEmail3">stock</label>
    <input type="text" class="form-control" name="stock" value="{{$productos->stock}}" placeholder="Ingresar la cantidad de productos"> 
    <label for="imagen">Imagen:</label>
      <input type="file" class="form-control" name="img">
     </div>
             <div class="text-center text-lg-start mt-4 pt-2">
           
               <button type="submit" name="Enviar"  class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Enviar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <a href="/productos/"><img src="https://cdn-icons-png.flaticon.com/512/61/61022.png" width="20" height="20"></button></a>
</section>

@endsection

