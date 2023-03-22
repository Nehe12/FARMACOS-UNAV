@extends('header')
@section('content')

<div class="card">
  <h5 class="card-header">CREAR INTERACCIONES</h5>
    <div class="card-body">
      <form action="{{route('store.interacciones')}}" method="post">
        @csrf
          <div class="col-md-9 pt-3">
              <label class="form-label" for="">Tipo de Interaccion</label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_interaccion" id="alimento" value="Alimento" required>
                <label class="form-check-label" for="tipo_interaccion">Alimento</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_interaccion" id="vitamina" value="Vitaminas" required>
                <label class="form-check-label" for="tipo_interaccion">Vitamina</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_interaccion" id="planta" value="Planta"  required>
                <label class="form-check-label" for="tipo_interaccion">Planta</label>
              </div>
          </div>

          <div class="mb-3 col-md-9 pt-3">
              <label for="interaccion" class="form-label">Interacción</label>
              <input type="text" class="form-control" id="interaccion" name="interaccion" placeholder="Interaccion" required>
          </div>
          <div class="py-2 col-md-9">
            <label for="farmaco" class="form-label">Farmaco</label>
              <select class="form-select" required aria-label="select example" name="farmaco" require placeholder="Seleccionar Farmaco" >
                <option value="">Seleccionar Farmaco</option>
                @if(isset($farmacos))
                @foreach($farmacos as $farma)
                <option value="{{$farma->id}}">{{$farma->farmaco}}</option>
                @endforeach
                @endif
              </select>
          </div>
          <div class="mb-3 col-md-9">
                <label for="estatus" class="form-label">Estatus</label>
                <input type="number" class="form-control" id="estatus" name="estatus" placeholder="Estatus" required>
          </div>
          <a href="{{route('inicio')}}" class="btn btn-info">INICIO</a> 
          <a href="{{route('crear.farmaco')}}" class="btn btn-info">REGRESAR</a>  
          <input type="submit" class="btn btn-primary " value="Guardar">
      </form>
    </div>
</div>
      
                  

@endsection 