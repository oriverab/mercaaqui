@extends('layouts.estructura')
@section('content')
<br>
<br>
<div class="col-sm-10">
<div class="container text-light  bg-dark col-sm-6 col-form-label fst-italic" style="border-radius: 8px">
<br>
<h2 class="text-light text-center">Registro Venta<img src="https://cdn-icons-png.flaticon.com/512/3082/3082031.png" width="40" height="40"></h2> 
<br> 
<div class="col">         
<form action="/ventas" method="POST">
            @csrf
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
  <br>
  <input class="btn btn-outline-light btn-block" type="submit" value="Guardar">
</div>
</div>
</div>
</form>
<div>
  <a href="/ventas/"><img src="https://image.flaticon.com/icons/png/512/2883/2883445.png" width="20" height="20"></button></a>
  </div>   
@endsection
<style>
  body {
    background: url("https://www.ceutaactualidad.com/media/ceutaactualidad/images/2020/05/12/2020051208322811894.jpg") no-repeat;
        background-size: cover;
  }
</style>