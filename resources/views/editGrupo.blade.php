@extends('header')
@section('content')
<a class=" btn btn-primary boton-select " href="" data-bs-toggle="modal" data-bs-target="#grupoU">CREAR GRUPO</a>

<!-- <div class="card">
    <div class="card-header">
        <h5 class="register card-title">GRUPOS</h5>
    </div>
    <div class="card-body">

    </div>
</div> -->

<div class="pt-3">
    <div class="col-sm-12 ">
        @if($mensaje = Session::get('msg'))
        <div id="mensaje" class="alert alert-warning" role="alert">
            <script>
                setTimeout(function() {
                    document.getElementById('mensaje')
                }, 4000)
            </script>
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

    <table id="tabla_grupo" class="table table-striped responsive" style="width:100%" style="white-space: nowrap; overflow-x: auto;">
        <thead>
            <tr>
                <th>ID</th>
                <th>GRUPO</th>
                <th>SUBGRUPO</th>
                <th>ACTUALIZAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($grupos))
            @foreach($grupos as $grupositem)

            <tr>
                <td>{{$grupositem->id}}</td>
                <td>{{$grupositem->grupo}}</td>
                <td>{{$grupositem->subgrupo}}</td>
                <td>
                    <button type="button" class="btn btn-info" id="bt-modalGrupo" data-bs-toggle="modal" data-bs-target="#editGrupo" data-id_grupo="{{$grupositem->id}}" data-grupo="{{$grupositem->grupo}}" data-subgrupo="{{$grupositem->subgrupo}}"><i class="bi bi-arrow-counterclockwise"></i></button>
                </td>
                <td>

                    <form class="delete_grupo" action="{{route('destroy.grupo',$grupositem->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="text" value="{{$grupositem->id}}" name="grupo_id" hidden>
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
                <th>GRUPO</th>
                <th>SUBGRUPO</th>
                <th>ACTUALIZAR</th>
                <th>ELIMINAR</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Modal Grupo -->
<div class="modal fade" id="grupoU" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">CREAR GRUPO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store2.grupo')}}" method="post">
                    @csrf
                    <div class="mb-3 ">
                        <label for="grupo" class="form-label">Grupo</label>
                        <input type="text" class="form-control" id="grupo" name="grupo" placeholder="Grupo" required>
                    </div>

                    <div class="mb-3 ">
                        <label for="subgrupo" class="form-label">Subgrupo</label>
                        <input type="text" class="form-control" id="subgrupo" name="subgrupo" placeholder="Subgrupo" required>
                    </div>

                    <div class="mb-3 col-md-9">
                        <div class="form-check">
                            <!-- <input class="form-check-input" type="checkbox" value="1" id="estatus" name="estatus"> -->
                            <!-- <label class="form-check-label" for="flexCheckDefault">Estatus</label> -->
                        </div>
                    </div>
                    <!-- <a href="{{route('crear.farmaco')}}" class="btn btn-info">REGRESAR</a> -->
                    <input type="submit" class="btn btn-primary " value="Guardar">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- Actualizar Modal Grupo -->
<div class="modal fade" id="editGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ACTUALIZAR GRUPO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('update.grupo')}}" method="post">
                    @csrf
                    @METHOD('PUT')
                    <input type="text" id="grupo_id" name="grupo_id" hidden>
                    <div class="">
                        <label for="grupoUP" class="form-label">Grupo</label>
                        <textarea class="form-control" name="grupoUP" id="grupoUP" cols="4" rows="2"></textarea>

                    </div>

                    <div class="pt-3">
                        <label for="subgrupoU" class="form-label">Subgrupo</label>
                        <textarea name="subgrupoU" id="subgrupoU" cols="4" rows="4" class="form-control"></textarea>

                    </div>

                    <div class="mb-3 col-md-9 pt-3">
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="estatus" name="estatus">
                            <label class="form-check-label" for="flexCheckDefault">Estatus</label>
                        </div> -->
                    </div>

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