@extends('header')

@section('content')
<div class="col-sm-12 ">
    @if($mensaje = Session::get('alert'))
    <div id="mensaje" class="alert alert-danger" role="alert">
        <script>
            setTimeout(function() {
                document.getElementById('mensaje')

                Swal.fire('Any fool can use a computer')

            }, 4000)
        </script>
        {{$mensaje}}
    </div>
    @endif
</div>

<div class="container p-6 w-75 bg-light mt-5 rounded shadow ancho">
    <div>
        <h2 class="text-center">
            BIENVENIDO
        </h2>
    </div>
    <div class="row p-3">
        <div class="col bg d-none d-lg-block">
            <img src="/img/logoNutri.png" class="rounded mx-auto d-block" width="100%" alt="...">

        </div>
        <div class="col">
            <form action="{{route('sesion.login')}}" method="post">
                @csrf
                @method('POST')
                <div class="col-mb-5 p-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password') {{$message}}@enderror
                </div>
                <div class="col-mb-4 p-4" >
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('email') {{$message}}@enderror
                </div>


                <div class="d-grid p-4">
                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection