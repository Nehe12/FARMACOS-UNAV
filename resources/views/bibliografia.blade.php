@extends('header')
@section('content')
<div class="card">
  <h5 class="card-header">CREAR BIBLIOGRAFIA</h5>
  <div class="card-body">
  <form action="{{route('store.bibliografia')}}" method="post">
                      @csrf 
                      <div class="mb-3 col-md-9 ">
                        <label for="Titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
                      </div>
                      <div class="mb-3 col-md-9">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required>
                      </div>
                      <div class="mb-3 col-md-9">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor" required>
                      </div>
                      <div class="mb-3 col-md-9">
                        <label for="año" class="form-label">Año</label>
                        <input type="datetime" class="form-control" id="año" name="año" placeholder="Año" required>
                      </div>
                      <div class="mb-3 col-md-9">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" class="form-control" id="editorial" name="editorial" placeholder="Editorial" required>
                      </div>
                      <div class="mb-3 col-md-9">
                        <label for="estatus"class="form-label">Estatus</label>
                        <input type="number" class="form-control" id="estatus" name="estatus" placeholder="Estatus" required>
                      </div>
                      <a href="{{route('crear.farmaco')}}" class="btn btn-info">REGRESAR</a>
                      <input type="submit" value="Guardar" class="btn btn-primary">
              </form>
  </div>
</div>

            
                
            
 @endsection