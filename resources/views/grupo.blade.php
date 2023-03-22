@extends('header')
@section('content')

<div class="card">
  <h5 class="card-header">GRUPO DE FARMACO</h5>
  <div class="card-body">
  <form action="{{route('store.grupo')}}" method="post">
                      @csrf
                      <div class="mb-3 col-md-9">
                        <label for="grupo" class="form-label">Grupo</label>
                        <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Grupo" required>
                      </div>

                      <div class="mb-3 col-md-9">
                        <label for="subgrupo" class="form-label">Subgrupo</label>
                        <input type="text" class="form-control" id="subgrupo" name="subgrupo" placeholder="Subgrupo" required>
                      </div>

                      <div class="mb-3 col-md-9">
                        <label for="estatus" class="form-label">Estatus</label>
                        <input type="number" class="form-control" id="estatus" name="estatus" placeholder="Estatus" required>
                      </div>
                      <a href="{{route('crear.farmaco')}}" class="btn btn-info">REGRESAR</a>
                      <input type="submit" class="btn btn-primary " value="Guardar">
      </form>
  </div>
</div>
      
                  

@endsection            