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
<div class="pt-3">
    <div class="row">
        <div class="col">
            <div class="card w-70">
                <div class="card-body">
                    <h4 class="card-title"><b>Bibliografias por fármacos</b></h4>
                    <canvas id="myChartbar"></canvas>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card w-70">
                <div class="card-body">
                    <h4 class="card-title"><b>Interacciones por fármacos</b></h4>
                    <canvas id="myChartline"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row pt-4">
    <div class="col">
        <div class="card w-70">
            <div class="card-body">
                <h4 class="card-title"><b>Fármacos por grupo</b></h4>
                <canvas id="myChartPie"></canvas>
            </div>
        </div>
    </div>
    <div class="col">

    </div>
</div>
<script>
    //Bibliografias por farmacos
    const farmaM = @JSON($biblios);
    console.log(farmaM);
    //Interacciones por farmacos
    const interM = @JSON($interac);
    console.log(interM);
    //Fármacos por grupo
    const grupoM = @JSON($grupos);
    console.log(grupoM);
</script>
@endsection