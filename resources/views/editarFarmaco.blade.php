@extends('header')
@section('content')

        
          
          <div class="card ">
              <div class="card-header">
              <h4 class="register card-title">EDITAR {{$farmacos->farmaco}}</h4>
              </div>
              <div class="card-body py-3">
               
                  <form class="was-validated" action="{{route('update.farmaco',$farmacos->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <input name="id" value="{{$farmacos->id}}" hidden>
                    <div class="row">
                      <div class="col">
                        <div class="col-md-9">
                          <label for="farmaco" class="form-label">Farmaco </label>
                          <input type="text" class="form-control is-valid"  name="farmaco" value="{{$farmacos->farmaco}}" required>
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                        <div class="col-md-9">
                          <label for="mecanismo" class="form-label">Mecanismo </label>
                          <input type="text" class="form-control is-valid" id="mecanismo" name="mecanismo" value="{{$farmacos->mecanismo}}" required>
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                        <div class="py-3 col-md-9">
                          <label for="mecanismo" class="form-label">Imagen Actual </label>
                          <img src="{{$farmacos->url}}" alt="" name="" class="rounded  d-block img-thumbnail" >
                        </div><!-- -->
                        <div class="py-3 col-md-9">
                          <label for="mecanismo" class="form-label">Agregar Imagen </label>
                          <input type="file" class="form-control" value="image" aria-label="file example" name="image"  required >
                          <div class="invalid-feedback">
                          </div>
                        </div><!-- -->
                        
                      </div>
                      <div class="col">
                        
                        <div class="col-md-9">
                          <label for="efecto" class="form-label">Efecto </label>
                          <input type="text" class="form-control is-valid" id="efecto" name="efecto" value="{{$farmacos->efecto}}" required>
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                      <!-- <div class="py-2 col-md-9">
                          <label for="" class="form-label">Bibliografia Actual</label>
                          <select class="form-select" required aria-label="select example" name="bibliografia" id="bibliografia" >
                         
                         
                          @foreach($bibliografia as $biblios)
                          @if($farmacos->id_bibliografia == $biblios->id)
                            <option value="{{$biblios->id}}">{{$biblios->titulo}}</option>
                          @endif
                          @endforeach
                        
                          </select>
                        </div>  -->
                        <!-- <div class="py-2 col-md-9">
                          <label for="" class="form-label">Grupo Actual</label>
                          <select class="form-select" required aria-label="select example" name="grupo" id="grupo">
                          @foreach($grupo as $grupos)
                          @if($farmacos->id_grupo == $grupos->id)
                          <option value="{{$grupos->id}}">{{$grupos->grupo}}</option>
                          @endif
                          @endforeach
                          
                          </select>
                        </div>  -->
                        <div class="py-2 col-md-9">
                          <label for="" class="form-label">Bibliografia</label>
                          <select class="form-select" required aria-label="select example" name="bibliografia" id="bibliografia" >
                          
                          @foreach($bibliografia as $biblios)
                          @if($farmacos->id_bibliografia == $biblios->id)
                            <option value="{{$biblios->id}}">{{$biblios->titulo}}</option>
                          @endif
                          <option value="{{$biblios->id}}">{{$biblios->titulo}}</option>
                          
                          @endforeach
                         
                          </select>
                        </div><!-- -->
                        <div class="py-2 col-md-9">
                          <label for="" class="form-label">Grupo</label>
                          <select class="form-select" required aria-label="select example" name="grupo" id="grupo">
                          @if(isset($grupo))
                          @foreach($grupo as $grupos)
                          @if($farmacos->id_grupo == $grupos->id)
                          <option value="{{$grupos->id}}">{{$grupos->grupo}}</option>
                          @endif
                          <option value="{{$grupos->id}}">{{$grupos->grupo}}</option>
                          @endforeach
                          @endif
                          </select>
                        </div><!-- -->
                        <div class="col-md-9">
                          <label for="estatus">Estatus</label>
                          <input type="number" class="form-control is-valid" name="estatus" id="estatus" required value="{{$farmacos->status}}">
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                        <div class="mb-3 enviar-form">
                          <a href="{{route('inicio')}}" class="btn btn-info">REGRESAR</a>
                          <button class="btn btn-warning" type="submit" >ACTUALIZAR</button>
                        </div><!-- -->
                      </div>
                    </div>
                      
                    </div>
                  </form>
                
              </div>
              </div>
          </div>
            
          
        
 @endsection
   
   
