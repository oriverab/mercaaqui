@extends('layouts.estructura')
@section('content')
@can('veradmin')


<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>iPortfolio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="stylesheet" href="{{asset('css/vendedores.css')}}">
 
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Bootstrap DataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<!-- Bootstrap ExportDataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
<!-- Font icons -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<!--  ExportDataTable JS -->
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.colVis.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var table = $('#ExportDataTable').DataTable( {
        lengthChange: false,
        //buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
		buttons: [ 'copy', 'excel', 'pdf', 'print']
    } );
    table.buttons().container()
        .appendTo( '#ExportDataTable_wrapper .col-sm-6:eq(0)' );
} );
</script>

</head>

<body>
  
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

 
<!-- ======= Header ======= -->
<header id="header">
  <div class="d-flex flex-column">
    <div class="profile">
      <br>
    <a class=" text-light" href="/"><h1>MercaAqui</h1></a>
     <img  src="{{asset('img/todo/logitosuper.jpg')}}">
                          <div>
                          <h4 class="text-center">
                            @guest    
                      @else
                              <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }}
                              </a>

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
                          </li>
                          </h4>
                      @endguest</div>
    </div>

    <nav id="navbar" class="nav-menu navbar">
      <ul>
        <li><a href="#inicio" class="nav-link scrollto active"><img src="https://cdn-icons-png.flaticon.com/512/553/553416.png" width="25" height="25"> <span>Home</span></a></li>
        <li><a href="/vendedor" class="nav-link active"><img  src="{{asset('img/todo/vendedor.jpg')}}" width="25" height="25"><span>Vendedores</span></a></li>
        <li><a href="/productos" class="nav-link active"><img src="https://cdn-icons-png.flaticon.com/512/1524/1524855.png"width="25" height="25"><span>Productos</span></a></li>
        <li><a href="/ventas" class="nav-link active"><img src="https://cdn-icons-png.flaticon.com/512/743/743007.png"width="25" height="25"><span>Ventas</span></a></li>
        <li><a href="#contact" class="nav-link active"><img src="https://cdn-icons-png.flaticon.com/512/3447/3447687.png"width="25" height="25"><span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->
  <br><br>
  <section id="inicio" class="d-flex flex-column justify-content-center align-items-center">
    <div class="inicio-container" data-aos="fade-in">
    <div class="section-title">
          <h2><img src="https://cdn-icons-png.flaticon.com/512/3082/3082031.png" width="40" height="40">Panel De Vendedores<img src="https://cdn-icons-png.flaticon.com/512/59/59549.png" width="45" height="25">
<a href="/vendedor/create"><button class="btn btn-info">registrar nuevo vendedor </button></a></h2>
        </div>
</div>

  <main id="main">
<br>


<table id="ExportDataTable" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
	<thead>
  <tr class="text-center"> 
			<th>Nombre</th>
			<th>Cedula</th>
			<th>Email </th>
			<th>Telefono</th>
      <th>Acciones</th>
      <th>Acciones</th>

		</tr>
	</thead>
  <tbody>
    @foreach($vendedor as $vendedor)
    <tr class="text-center"> 
        <td>{{$vendedor->nombre}}</td>
        <td>{{$vendedor->cedula}}</td>
        <td>{{$vendedor->email}}</td>
        <td>{{$vendedor->telefono}}</td>
        <td><a href="/vendedor/edit/{{$vendedor->id}}" > <img src="https://cdn-icons-png.flaticon.com/512/588/588395.png" width="30" height="30"></a></td>
        <td><form action="/vendedor/{{$vendedor->id}}" class="formulario-eliminar" method="POST">
                            @csrf
                            @method('delete')<button class="bg-transparent" style="border:none;"type=submit  onclick="return elimina()"> <img src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png" width="30" height="30"></button>
            </form></td>
        </tr>
        @endforeach
    </tbody>
</table>
  @can('veradmin')
  <a href="/admin">
  <button><img src="https://cdn-icons-png.flaticon.com/512/61/61022.png" width="20" height="20"></button></a>
  @endcan
</section>
@else
<div>
<div class="cardE" style="position:relative;">
  <img class="card-img-top" src="https://tse1.explicit.bing.net/th?id=OIP.q9ZU62uVwoXah2_pLpAQ0wHaD4&pid=Api&P=0&w=306&h=161" width="50" height="180">
  <div class="card-body">
    <p class="card-text font-italic text-center">No Cuentas Con Los Permisos Necesarios Para Acceder Aqui </p>
   <a href="/home"> <button class="btn-danger btn-group-toggle">Regresar</button></a>
  </div>
</div>
</div>
  
</body>

</html>
@endcan

                    
@endsection 
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function elimina(){
  var respuesta = confirm("estas seguro que deseas eliminar");
  if (respuesta == true)
  {
    return true;
  }
  else
  {
    return false;
  } 
  } 
  </script>


@endsection 

