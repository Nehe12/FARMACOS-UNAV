@extends('header')
@section('content')

<div class="row">
     <div class="col"> <!--Farmaco con biliografias-->
        <table id="reporte_1" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FÁRMACO</th>
                    <th>BIBLIOGRAFIAS</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($farma_biblio))
                @foreach($farma_biblio as $itemB)
                <tr>
                    <td>{{$itemB->far}}</td>
                    <td>{{$itemB->farmaco}}</td>
                    <td>{{$itemB->titulos}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>FÁRMACO</th>
                    <th>BIBLIOGRAFIAS</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col"> <!-- Farmaco con interacciones-->
        <table id="reporte_2" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>FARMACO</th>
                    <th>EFECTO</th>
                    <th>MECANISMO</th>
                    <th>GRUPO</th>
                    <th>INTERACCION</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($farma_grupo))
                @foreach($farma_grupo as $itemG)
                <tr>
                    <td>{{$itemG->farmaco}}</td>
                    <td>{{$itemG->efecto}}</td>
                    <td>{{$itemG->mecanismo}}</td>
                    <td>{{$itemG->grupo}}</td>
                    <td>{{$itemG->interaccion}}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>FARMACO</th>
                    <th>EFECTO</th>
                    <th>MECANISMO</th>
                    <th>GRUPO</th>
                    <th>INTERACCION</th>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
<div class="row pt-3">
    <div class="col">
        <div class="col">
            <div class="card w-70">
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="col">
            <div class="card w-70">
                <div class="card-body">
                    <canvas id="myChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const farmaM = @JSON($biblios);
    console.log(farmaM);
</script>
@endsection