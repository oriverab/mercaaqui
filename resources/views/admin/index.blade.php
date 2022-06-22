@extends('layouts.estructura')
@section('content')
@can('veradmin')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="assets/img/favicon.png" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="{{asset('css/estilito.css')}}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
  
  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <br><br>
      <a class=" text-light" href="/"><h1>MercaAqui</h1></a> <br>
        <h1 class="text-light"><a href="/">Administrador</a></h1>
      </div>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#inicio" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#Panel-Vendedores" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Vendedores</span></a></li>
          <li><a href="#Panel-Productos" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Productos</span></a></li>
          <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
   <!-- ======= Mobile nav toggle button ======= -->
   <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>



   <!-- ======= Header ======= -->
<header id="header">
  <div class="d-flex flex-column">

    <div class="profile">
      <br>
    <a class=" text-light" href="../admin"><h1>MercaAqui</h1></a>
    <a href="../admin"> <img src="{{asset('img/todo/logitosuper.jpg')}}"></a>
    
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
        <li><a href="#inicio" class="nav-link scrollto active"><img  src="{{asset('img/todo/home.jpg')}}" width="25" height="25"> <span>Home</span></a></li>
        <li><a href="#Panel-Vendedores" class="nav-link active"><img src="{{asset('img/todo/vendedor.jpg')}}" width="25" height="25"><span>Vendedores</span></a></li>
        <li><a href="#Panel-Productos" class="nav-link active"><img src="https://cdn-icons-png.flaticon.com/512/1524/1524855.png"width="25" height="25"><span>Productos</span></a></li>
        <li><a href="#Panel-ventas" class="nav-link active"><img src="https://cdn-icons-png.flaticon.com/512/743/743007.png"width="25" height="25"><span>Ventas</span></a></li>
        <li><a href="#contact" class="nav-link active"><img src="https://cdn-icons-png.flaticon.com/512/3447/3447687.png"width="25" height="25"><span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->
  </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="inicio" class="d-flex flex-column justify-content-center align-items-center">
  <div class="inicio-container" data-aos="fade-in">
  <div class='console-container'>
<span id='text'></span>
 <div class='console-underscore' id='console'><img src="https://cdn-icons-png.flaticon.com/512/3082/3082031.png" height="75px" width="75px" ></div>
 </div>
<style>
 .hidden {
 opacity:0;
}
.console-container {
 font-family:arial;
 font-size:6em;
 text-align:center;
 height:30px;
 width:600px;
 display:inline;
 position:relative;
 color:black;
 top:0;
 bottom:0;
 left:10px;
 right:0;
 margin:auto;
}
.console-underscore {
 display:inline-block;
 position:relative;
 left:10px;
 
}
 
@media (max-width: 750px) {
 .console-container { font-size:2em; }
}
</style>

<script>
    // function([string1, string2],target id,[color1,color2])
 consoleText(['MercaAqui'], 'text',['#ffffff']);
 function consoleText(words, id, colors) {
  if (colors === undefined) colors = ['#fff'];
  var visible = true;
  var con = document.getElementById('console');
  var letterCount = 1;
  var x = 1;
  var waiting = false;
  var target = document.getElementById(id)
  target.setAttribute('style', 'color:' + colors[0])
  window.setInterval(function() {
  
  if (letterCount === 0 && waiting === false) {
  waiting = true;
  target.innerHTML = words[0].substring(0, letterCount)
  window.setTimeout(function() {
  var usedColor = colors.shift();
  colors.push(usedColor);
  var usedWord = words.shift();
  words.push(usedWord);
  x = 1;
  target.setAttribute('style', 'color:' + colors[0])
  letterCount += x;
  waiting = false;
  }, 1000)
  } else if (letterCount === words[0].length + 1 && waiting === false) {
  waiting = true;
  window.setTimeout(function() {
  x = -1;
  letterCount += x;
  waiting = false;
  }, 1000)
  } else if (waiting === false) {
  target.innerHTML = words[0].substring(0, letterCount)
  letterCount += x;
  }
  }, 120)
  window.setInterval(function() {
  if (visible === true) {
  con.className = 'console-underscore hidden'
  visible = false;
  
  } else {
  con.className = 'console-underscore'
  
  visible = true;
  }
  }, 400)
 }
</script>
  </div>
</section>

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="Panel-Vendedores" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Panel De Vendedores</h2>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="https://cdn-icons-png.flaticon.com/512/1256/1256650.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content " data-aos="fade-left">
            <h3>Personal-MercaAqui</h3>
            <br><br>
            <p class="fst-italic">
            <a href="/vendedor" class="text-light"><button class=" btn-block btn-lg btn-danger" >Ir Al Panel Principal</button></a>
            </p>
          </div>
        </div>
         
      </div>
      
    </section><!-- End About Section -->
<br>
 <!-- ======= 2-About Section ======= -->
 <section id="Panel-Productos" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Panel De Productos</h2>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="https://cdn-icons-png.flaticon.com/512/3787/3787594.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content " data-aos="fade-left">
            <h3>Productos-MercaAqui</h3>
            <br><br>
            <p class="fst-italic">
            <a href="/productos" class="text-light"> <button class=" btn-block btn-lg btn-info" >Ir Al Panel Principal</button></a>
            </p>
          </div>
        </div>
         
      </div>
      
    </section><!-- 2-End About Section -->
<br>
 <!-- ======= 3-About Section ======= -->
<section id="Panel-ventas" class="about">
      <div class="container">
    <div class="section-title">
          <h2>Panel De ventas</h2>
        </div>
        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img src="https://cdn-icons-png.flaticon.com/512/1069/1069102.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content " data-aos="fade-left">
            <h3>listado-compras</h3>
            <br><br>
            <p class="fst-italic text-light">
            <a href="/ventas" class="text-light"><button class=" btn-block btn-lg btn-warning" >Ir Al Panel Principal</button></a>
            </p>
          </div>
        </div>     
      </div>
    </section><!-- 3-End About Section -->
    <!-- ======= Contact Section ======= -->
   <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"><img src="https://cdn-icons-png.flaticon.com/512/819/819814.png" width="20" height="20"></i>
                <h4>Location:</h4>
                <p>Cl. 17, Mosquera, Cundinamarca</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"><img src="https://cdn-icons-png.flaticon.com/512/5968/5968534.png" width="20" height="20"></i>
                <h4>Email:</h4>
                <p>mercaAqui@coorporativo.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"><img src="https://cdn-icons-png.flaticon.com/512/3014/3014736.png" width="20" height="20"></i>
                <h4>Call:</h4>
                <p>+5715462323</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.426576969296!2d-74.21781468590986!3d4.695709043009956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9d58cf6e291b%3A0x8946ec678fcf04b4!2sSENA%20MOSQUERA%20(CBA)!5e0!3m2!1ses-419!2sco!4v1631031333257!5m2!1ses-419!2sco"  frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>
            
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form  action="/admin/create" method="POST" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6 text-dark">
                  <label for="name">Nombre Completo</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 text-dark">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group text-dark">
                <label for="name">Asunto</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group text-dark">
                <label for="name">Mensaje</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="text-center"><button type="submit" name="enviar">Enviar Mensaje</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- logo -->
    <div class="container bg-dark">
 <div class="main center">
        <div class="icon center">
        <i class="fab fa-facebook-f fa-2x"></i>
 </div>   
    <div class="icon center">
    <i class="fab fa-instagram fa-2x"></i>
 </div>   
<div class="icon center">
<i class="fab fa-whatsapp fa-2x"></i>
</div>     
<div class="icon center">
<i class="fab fa-twitter  fa-2x"></i>
</div>   
</div>
</div>
<!-- end logo -->
  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>MercaAqui</span></strong>
      </div>
      
    </div>
    
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  @else
<div>
<div class="cardE" style="position:relative;">
  <img class="card-img-top" src="https://www.hostingplus.com.co/wp-content/uploads/2020/12/error404quees.jpg" width="50" height="500">
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


<!--// para organizar codigo. primero seleccionar todo y despues presionar
el control + k + d //--> 