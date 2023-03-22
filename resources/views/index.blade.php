@extends('header')
@section('content')

    <a class="btn btn-primary " href="{{ route('crear.farmaco') }}" >CREAR NUEVO FARMACO</a>
    <a class="btn btn-primary " href="{{route('create.interacciones')}}" >INTERACCIONES</a>
     <div class="row">
         <div class="col pt-2">
            <div class="card ">
                <h4 class="card-header">LISTA DE LOS FARMACOS</h4>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-sm-12">
                            @if($mensaje = Session::get('success'))
                                <div class="alert alert-success" role="alert">
                                    {{$mensaje}}
                                </div>
                            @endif
                        </div>
                    </div>
        <table id="farmaco" class="table table-striped responsive" style="width:100%" style="white-space: nowrap; overflow-x: auto;">
        <thead>
            <tr>
                <th>FARMACO</th>
                <th>MECANISMO</th>
                <th>EFECTO</th>
                <th>BIBLIOGRAFIA</th>
                <th>GRUPO</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($farmacos))
                   @foreach($farmacos as $far)
            <tr>
                <td>{{$far->farmaco}}</td>
                <td>{{$far->mecanismo}}</td>
                <td>{{$far->efecto}}</td>
                <td>{{$far->titulo}}</td>
                <td>{{$far->grupo}}</td>
                <td>
                    <div class="text-start">
                        <a href="{{route('ver.farmaco',$far->id)}}" class="btn btn-success btnShow btn-sm"  >
                        <i class="bi bi-eye-fill"></i>  
                        </a>
                    </div>
                </td>
                <td>
                    <div class="text-start">
                        <a href="{{route('edit.farmaco',$far->id)}}" class="btn btn-warning btnEditar btn-sm" >
                            <i class="bi bi-pencil-square"></i>  
                        </a>
                    </div>
                </td>
                <td>
                    <div class="text-start">
                        <!-- {{route('show.farmaco',$far->id)}} -->
                        <a href="{{route('show.farmaco',$far->id)}}" class="btn btn-danger btnDelete btn-sm" data-bs-target="#staticBackdrop">
                            <i class="bi bi-trash3-fill"></i>
                        </a> 
                        <!-- <button type="button" class="btn btn-danger btnDelete btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="bi bi-trash3-fill"></i>
                        </button> -->
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <th>FARMACO</th>
                <th>MECANISMO</th>
                <th>EFECTO</th>
                <th>BIBLIOGRAFIA</th>
                <th>GRUPO</th>
                <th>VER</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </tr>
        </tfoot>
        </table>
                </div>
            </div>
         </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
   <!-- Modal -->
    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Farmaco</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
           
            
            <form class="was-validated" action="" method="get">
                @csrf
                <label for="farma" class="form-label">Nombre</label>
                <input type="text" class="form-control is-valid" name="" value="" id="farma">
            </form>
           
        </div>
        
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>
        </div>
        </div>
    </div> -->
    

          
@endsection