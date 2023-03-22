@extends('header')
@section('content')

        
          
          <div class="card ">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs pe-2">
                  <li class="nav-item">
                    <a class="nav-link btn btn-primary boton-select " aria-current="true" href="#">FARMACO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link btn btn-primary boton-select" href="{{route('create.interacciones')}}">INTERACCIONES</a>
                  </li>
                </ul>
              </div>
              <div class="card-body py-3">
              <h4 class="register card-title">REGISTRO DE FARMACO</h4>
              <div class="row">
                        <div class="col-sm-12">
                            @if($mensaje = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{$mensaje}}
                                </div>
                            @endif
                        </div>
                    </div>
              <div>
                  <form class="was-validated" action="{{route('store.farmaco')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col">
                        <div class="col-md-9">
                          <label for="farmaco" class="form-label">Farmaco </label>
                          <input type="text" class="form-control is-valid"  name="farmaco"  required>
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                        <div class="col-md-9">
                          <label for="mecanismo" class="form-label">Mecanismo </label>
                          <input type="text" class="form-control is-valid" id="mecanismo" name="mecanismo" value="" required>
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                        <div class="py-3 col-md-9">
                          <label for="mecanismo" class="form-label">Agregar Imagen </label>
                          <input type="file" class="form-control" value="image" aria-label="file example" name="image" required >
                          <div class="invalid-feedback">
                          </div>
                        </div><!-- -->
                        <div class="col-md-9">
                          <label for="efecto" class="form-label">Efecto </label>
                          <input type="text" class="form-control is-valid" id="efecto" name="efecto" value="" required>
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                      </div>
                      <div class="col">
                        <div class="py-2 col-md-9">
                          <label for="" class="form-label">Bibliografia</label>
                          <select class="form-select" required aria-label="select example" name="bibliografia" id="bibliografia" >
                          <option value="">Seleccionar Bibliografia</option>
                          @if(isset($bibliografia))
                          @foreach($bibliografia as $biblios)
                          <option value="{{$biblios->id}}">{{$biblios->titulo}}</option>
                          @endforeach
                          @endif
                          </select>
                          <!-- {{route('create.bibliografia')}} -->
                          <a class=" btn btn-primary boton-select" href="" data-bs-toggle="modal" data-bs-target="#bibliografiaM">CREAR BIBLIOGRAFIA</a>
                        </div><!-- -->
                        <div class="py-2 col-md-9 ">
                          <label for="" class="form-label">Grupo</label>
                          <select class="form-select " required aria-label="select example" name="grupo" id="grupo">
                          <option value="">Seleccionar Grupo</option>
                          @if(isset($grupo))
                          @foreach($grupo as $grupos)
                          <option value="{{$grupos->id}}">{{$grupos->grupo}}</option>
                          @endforeach
                          @endif
                          </select>
                          <a class=" btn btn-primary boton-select" href=""data-bs-toggle="modal" data-bs-target="#grupoM">CREAR GRUPO</a>
                        </div><!-- -->
                        <div class="col-md-9">
                          <label for="estatus">Estatus</label>
                          <input type="number" class="form-control is-valid" name="estatus" id="estatus" required>
                          <div class="valid-feedback">
                          </div>
                        </div><!-- -->
                        <div class="mb-3 enviar-form">
                          <a href="{{route('inicio')}}" class="btn btn-info">INICIO</a>
                          <!-- <a class=" btn btn-primary " href="{{route('create.interacciones')}}">CREAR INTERACCIONES</a> -->
                          <button class="btn btn-primary" type="submit" >GUARDAR FARMACO</button>
                        </div><!-- -->
                      </div>
                    </div>
                      </div>
                    </div>
                  </form>
       
              </div>
              </div>
          </div>
          <!-- Modal Bibliografia -->
          <div class="modal fade" id="bibliografiaM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">CREAR BIBLIOGRAFIA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
          </div>

          <!-- Modal Grupo -->
         
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">CREAR GRUPO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
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
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
              </div>
            </div>
          </div>
          </div>

          
        
 @endsection
   
   
