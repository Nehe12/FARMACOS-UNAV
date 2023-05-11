@extends('header')
@section('content')

<div class="row">
    <div class="col">
        <table id="reporte_1" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
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
@endsection