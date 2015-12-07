@extends('admin_template')

@section('title')
Proyecto <strong>{!! $project->name !!}</strong>
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection


@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('projects') !!}"></i> Proyectos</a>
    <li class="active">Gantt Proyecto</li>
@endsection

@section('content')
<a href="{!! url('download-excel') !!}/{!! $id !!}" class="btn btn-info pull-right">Descargar Excel</a>
<br /><br />
<div id="ganttChart"></div>
<br/><br/>

<div id="eventMessage"></div>
<div class="panel panel-primary hide" id="desc-panel">
  <div class="panel-heading">
    <h3 class="panel-title"></h3>
  </div>
  <div class="panel-body">
  	<p></p>
  </div>
  <div class="panel-footer total">
  </div>
</div>
<!--js-->
    
    <script src="{{ asset ("public/lib/jqueryGantt/jquery-ui-1.8.4.js") }}"></script>
    <script src="{{ asset ("public/lib/jqueryGantt/jquery.ganttView.js") }}"></script>
    <script src="{{ asset ("public/lib/jqueryGantt/date.js") }}"></script>

<!--css-->
<link href="{{ asset("public/lib/jqueryGantt/jquery-ui-1.8.4.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("public/lib/jqueryGantt/jquery.ganttView.css")}}" rel="stylesheet" type="text/css" />

<script type="text/javascript">
var ganttData = [
	@foreach($etapa_project as $ep)
	{
		id: {!! $ep->id !!}, name: "{!! $ep->etapa !!}", 
			series: [
				@foreach($ep->activity_project as $act)
				{ 
					id: "{!! $act->id !!}", 
					name: "{!! $act->name !!}", 
					start: new Date({!! date("Y", strtotime($act->date_start)); !!},
									{!! date("m", strtotime($act->date_start))-1; !!},
									{!! date("d", strtotime($act->date_start)); !!}), 
					end: new Date({!! date("Y", strtotime($act->date_end)); !!},
									{!! date("m", strtotime($act->date_end))-1; !!},
									{!! date("d", strtotime($act->date_end)); !!}), 
					color: "#f0f0f0" 
				},
				@endforeach
			]
	},
	@endforeach
];

function getActivity(data){
	    var ms = '';
	    var name = data.name;
		var fechas_start = data.start;
		var fecha_end = data.end;
		var total = 0;
		$.get( "{!! URL::to('/') !!}/perfiles/getPerfil/"+data.id, function( data2 ) {
			if(data2.length == 0 ){
				ms = '</br>Sin perfiles asociados.';
			}
			for (i = 0; i < data2.length; i++) { 
				num = i+1;
			    ms = ms+'</br><strong>Perfil '+num+' : '+data2[i].name+'</strong> </br> Costo Mensual: '+data2[i].monthly_cost+' </br> UF por Hora: '+data2[i].hours_cost_uf ;
			    total = total + parseInt(data2[i].monthly_cost);
			}
			
			$("#desc-panel").find('.panel-title').text(name);
			$('#desc-panel').find('.panel-body p').html('Fecha inicio: '+fechas_start.toString("d/M/yyyy")
				+'</br> Fecha final: '+fecha_end.toString("d/M/yyyy")
					+ms);
			$(".total").html('<p>Total: '+total+'</p>');
			$("#desc-panel").removeClass('hide');
		});
}

var actualizaFecha = function(data){
	datos = {  start : data.start , end : data.end, id : data.id };	
	$.get( "{!! URL::to('/') !!}/update-dates/"+data.start.toString("yyyy-M-d")+"/"+data.end.toString("yyyy-M-d")+"/"+data.id, function( data ) {
  	});
}


		$(function () {
			$("#ganttChart").ganttView({ 
				data: ganttData,
				slideWidth: 900,
				behavior: {
					onClick: function (data) { 
						getActivity(data);
					},
					onResize: function (data) {
						actualizaFecha(data) 
						getActivity(data);
					},
					onDrag: function (data) { 
						actualizaFecha(data)
						getActivity(data);
					}
				}
			});
		});
</script>
@endsection
