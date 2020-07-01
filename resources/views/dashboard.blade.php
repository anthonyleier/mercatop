@extends('layouts.template')

@section('scripts')
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    	google.charts.load('current', {'packages':['corechart']});
    	google.charts.setOnLoadCallback(drawChart);

    	function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	        	['Hora', 'Média de Vendas'],
	        	@foreach ($vendas_hora as $v)
	        	[{{ $v->hora }},  {{ $v->media }}],
	        	@endforeach
        	]);
	        var options = {
	        	title: 'Vendas por Hora',
	        	curveType: 'function',
	        	legend: { position: 'bottom' }
	        };
        	var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        	chart.draw(data, options);
    	}
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          @foreach ($produto as $p)
          ['{{ $p->nome }}',     {{ $p->quantidade }}],
          @endforeach
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection

@section('pagina')
	<div class="row">
		<div class="col-md-6" id="curve_chart"></div>
		<div class="col-md-6" id="piechart"></div>
	</div>
@endsection