@extends('header')
@section('content')
<a class=" btn btn-primary boton-select " href="" data-bs-toggle="modal" data-bs-target="#bibliografiaU">CREAR BIBLIOGRAFIA</a>

<!-- <div class="card">
    <div class="card-header">
        <h5 class="register card-title">BIBLIOGRAFIAS</h5>
    </div>
    <div class="card-body">
    </div>
</div > -->
<div class="pt-3">
    <div class="col-sm-12 ">
            @if($mensaje = Session::get('msg'))
            <div id="mensaje" class="alert alert-warning" role="alert">
                {{$mensaje}}
            </div>
            @endif
    </div>
    <div id="mensaje" class="col-sm-12 ">
            @if($mensaje = Session::get('msgDelete'))
            <div class="alert alert-success" role="alert">
                <script></script>
                {{$mensaje}}
            </div>
            @endif
    </div>
        <table id="tabla_biblios" class="table table-striped responsive" style="width:100%" style="white-space: nowrap; overflow-x: auto;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    <th>AUTOR</th>
                    <th>AÑO</th>
                    <th>EDITORIAL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($biblios))
                @foreach($biblios as $bibliositem)

                <tr>
                    <td>{{$bibliositem->id}}</td>
                    <td>{{$bibliositem->titulo}}</td>
                    <td>{{$bibliositem->descripcion}}</td>
                    <td>{{$bibliositem->autor}}</td>
                    <td>{{$bibliositem->anio}}</td>
                    <td>{{$bibliositem->editorial}}</td>
                    <td>
                        <button type="button" class="btn btn-info" id="bt-modalBiblio" data-bs-toggle="modal" data-bs-target="#editarBiblio" data-id_biblio="{{$bibliositem->id}}" data-titulo="{{$bibliositem->titulo}}" data-descrip="{{$bibliositem->descripcion}}" data-autor="{{$bibliositem->autor}}" data-anio="{{$bibliositem->anio}}" data-editorial="{{$bibliositem->editorial}}"><i class="bi bi-arrow-counterclockwise"></i></button>
                    </td>
                    <td>

                        <form class="delete_bibliografia" action="{{route('destroy.biblio',$bibliositem->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="text" value="{{$bibliositem->id}}" name="biblio_id" hidden>
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>

                        </form>

                    </td>
                </tr>

                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DESCRIPCION</th>
                    <th>AUTOR</th>
                    <th>AÑO</th>
                    <th>EDITORIAL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </tfoot>
        </table>

</div>
<!-- Modal Bibliografia -->
<div class="modal fade" id="bibliografiaU" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">CREAR BIBLIOGRAFÍA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store2.bibliografia')}}" method="post">
                    @csrf
                    <div class="mb-3  ">
                        <label for="Titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" placeholder="Autor" required>
                    </div>
                    <div class="mb-3">
                        <label for="año" class="form-label">Año</label>
                        <input type="datetime" class="form-control" id="año" name="año" placeholder="Año" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" class="form-control" id="editorial" name="editorial" placeholder="Editorial" required>
                    </div>
                    <div class="mb-3 col-md-9">
                        <!-- <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="estatus" name="estatus">
                  <label class="form-check-label" for="flexCheckDefault">Estatus</label>
                </div> -->
                    </div>
                    <!-- <a href="{{route('crear.farmaco')}}" class="btn btn-info">REGRESAR</a> -->
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Actualizar Bibliografia -->
<div class="modal fade" id="editarBiblio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ACTUALIZAR BIBLIOGRAFÍA</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.biblio')}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" id="biblioID" name="biblioID" hidden>
                    <div class="  ">
                        <label for="Titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="tituloU" name="tituloU" placeholder="Titulo" required>
                    </div>
                    <div class="">
                        <label for="descripcionU" class="form-label">Descripcion</label>
                        <textarea name="descripcionU" class="form-control" id="descripcionU" cols="8" rows="4"></textarea>

                    </div>
                    <div class="">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" id="autorU" name="autorU" placeholder="Autor" required>
                    </div>
                    <div class="">
                        <label for="año" class="form-label">Año</label>
                        <input type="datetime" class="form-control" id="añoU" name="añoU" placeholder="Año" required>
                    </div>
                    <div class="">
                        <label for="editorial" class="form-label">Editorial</label>
                        <input type="text" class="form-control" id="editorialU" name="editorialU" placeholder="Editorial" required>
                    </div>
                    <div class="mb-3 col-md-9 pt-3">
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="estatusU" name="estatusU">
                            <label class="form-check-label" for="flexCheckDefault">Estatus</label>
                        </div> -->
                    </div>

                    <input type="submit" value="Guardar" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
@endsection