@extends('admin_template')

@section('title')
Actividades Etapas
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection


@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('activity-etapas-projects') !!}/{!! $id_project !!}/{!! $id_etapa_project !!}"></i> Etapas</a>
    <li class="active">Actividades Etapas</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection