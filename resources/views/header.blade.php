<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/farm.css') }}">
  <title>REGISTRO FARMACO</title>
</head>

<body>
  <nav class="navbar navbar-dark bg-primary pt-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><span class="navbar ">NUTRICIÓN</span></a>
      <!-- <a class="navbar-brand justify-content-end " href="get_data">REPORTES</a> -->
      <!-- <a class="navbar-brand" href="#">NUTRICIÓN</a>
            <a class="navbar-brand" href="#">NUTRICIÓN</a> -->
    </div>

  </nav>
  <div class="container pt-3 ">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <!-- Datatables -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <!-- Sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- <script src="/js/dataTables.js"></script> -->
  <script src="{{ asset('js/script.js') }}"></script>
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