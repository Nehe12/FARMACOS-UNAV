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
<div class="p-6">
    <div class="row">
        <div class="col image">

        </div>
        <div class="col">
            <form action="{{route('sesion.login')}}" method="post">
                @csrf
                @method('POST')
                <div class="col-md-7">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password') {{$message}}@enderror
                </div>
                <div class="col-md-7">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('email') {{$message}}@enderror
                </div>

                <!-- <div class="mb-3 form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Recordar</label>
    </div> -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection