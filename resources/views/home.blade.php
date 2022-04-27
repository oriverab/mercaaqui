@extends('layouts.estructura')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <br><br>
            <div class="card">
                <div class="card-header"> 
                <img src="http://2.bp.blogspot.com/-jUnHPq4D87Y/UXFhEeoiIiI/AAAAAAAAAGE/0RPq5EYB2G0/s1600/Nombre-animado-Bienvenido-08.gif"  width="100%">             
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="text-center font-italic">
                    {{ __('Ingresaste a MercaAqui') }}</h4>
                    <h4 class="text-center font-italic">
                    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="40" height="40"><a  class="text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                    <br><br>
                    @can('menuadministrador')
                        <a href="/admin"> <button class="btn-info">Ir Al Panel Administrador </button></a>
                            @endcan
                                @can('menuvendedor')
                                    <a href="/ventas"> <button class="btn-danger">Ir Al Panel De Ventas </button></a>
                                        @endcan
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>
                                    
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                      
                                  </form>
                              </div>
                </a>
                              </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
