@extends('header')
@section('content')
<div class="col-sm-12 ">
      @if($mensaje = Session::get('success'))
      <div class="alert alert-success" role="alert">
        {{$mensaje}}
      </div>
      @endif
    </div>
<form action="{{route('save.usuario')}}" method="POST">
     @csrf
     @method("post")
  <div class="col-4">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name"  name="name"  required>
  </div>
  <div class="col-4">
    <label for="email" class="form-label">email address</label>
    <input type="email" class="form-control" id="email" name="email"  required>
  </div>
  <div class="pt-3 col-12">
    <button class="btn btn-primary" type="submit">Enviar datos</button>
  </div>
</form>
 @endsection