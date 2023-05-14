<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @yield('style')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!-- Bootstrap CSS -->
  <!-- 
  <link href="bootstrap.css" rel="stylesheet">
  <link href="bootstrap-switch.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">


  <!-- Boostrap select -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
  <title>REGISTRO FARMACO</title>
</head>

<body>
  <div class="cargando">
    <div class="loader-outer"></div>
    <div class="loader-inner"></div>
  </div>
  <nav class="fixed-top bg-dark navbar-dark p-3  ">

    <ul class="nav justify-content-center">
      <li class="nav-item pe-3">
        <a class="nav-link navbar-brand" aria-current="page" href="{{route('inicio')}}"><span class="navbar">INICIO</span></a>
      </li>
      <li class="nav-item pe-3">
        <a class="nav-link navbar-brand" href="{{route('show.biblios')}}"><span class="navbar">BIBLIOGRAFÍAS</span></a>
      </li>
      <li class="nav-item pe-3">
        <a class="nav-link navbar-brand" href="{{route('show.grupos')}}"><span class="navbar">GRUPOS</span></a>
      </li>
      <li class="nav-item pe-3">
        <a class="nav-link navbar-brand" href="{{route('show.reporte')}}"><span class="navbar">REPORTES</span></a>
      </li>
      <li class="nav-item pe3">
        <form action="{{route('logout')}}" method="post">
          @csrf 
          <a class="nav-link navbar-brand" 
          onclick="this.closest('form').submit()" 
          href="#"> <span class="navbar"> CERRAR SESIÓN</span></a>
        </form>
      </li>


    </ul>



    <!-- <a class="navbar-brand" href="/"><span class="navbar ">NUTRICIÓN INICIO</span></a>
      <a class="navbar-brand jus " href="get_data">REPORTES</a> -->
    <!--  <a class="navbar-brand" href="#">NUTRICIÓN</a> -->
    <!-- <a class="navbar-brand" href="#">NUTRICIÓN</a>  -->


  </nav>
  <div class="container p-5 ">
    <div class="p-5">
      @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- Datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <!-- Sweetalert2 -->


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Boostrap select -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>"></script> -->
  <!-- CHART JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- <script src="/js/dataTables.js"></script> -->
  <script src="{{ asset('js/script.js') }}"></script>
  <script src="{{ asset('js/graficas.js') }}"></script>
  <script src="{{ asset('js/timeOut.js') }}"></script>


  <!-- <script src="js/script.js"></script> -->
  <!-- <script>
            
            $(document).on('click',"#bt-modal",function () {
              var id = $(this).data('id_inter');
              var interaccion = $(this).data('inter');

              $("#id_interaccion").val(id);
              $("#inter").val(interaccion);
              
            });
          </script> -->


</body>

</html>