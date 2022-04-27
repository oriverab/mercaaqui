@extends('layouts.estructura')
@section('content')
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://estudiosanamar.com/formacion/wp-content/uploads/2020/10/cajerrp.jpg" class="img-fluid">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-6 offset-xl-1">
      <form action="/ventas" method="POST">
            @csrf
            <div class="divider d-flex align-text-center my-4">
               <h1 class="text-center" fw-bold mx-3 mb-0> FORMULARIO  VENTAS</h1>     
             
          </div>
         
          <div class="form-group">
              <p>nombre del producto</p>
            <select class="form-control placeholder" id="nombre" name="nombre"> 
            <option value="" selected disabled>Please select</option>
            @foreach($productos as $productos)
            <option value="{{$productos->nombre}}">{{$productos->nombre}}</option>   
            @endforeach
            </select>
  <div class="form-group">
  <!-- <label for="inputEmail3">precio del producto</label>
  <input type="text" class="form-control" name="precio" placeholder="Ingresar precio"> -->
  <label for="inputEmail3">cantidad</label>
  <input type="text" class="form-control" name="cantidad" placeholder="Ingresar la cantidad de productos">
  <p>nombre de el vendedor</p>
  @php
  $nombre = Auth::user()->name
  @endphp
  <input type="text" value="{{$nombre}}" class="form-control" name="vendedor" placeholder= "{{$nombre}}" disabled>  
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

