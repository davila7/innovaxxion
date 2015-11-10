@extends('admin_template')

@section('title')
Etapas Proyectos
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection


@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('etapas-projects') !!}/{!! $id_project !!}"></i> Etapas</a>
    <li class="active">Etapas Proyectos</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection