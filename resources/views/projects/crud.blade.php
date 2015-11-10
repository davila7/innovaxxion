@extends('admin_template')

@section('title')
Proyectos
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
    <li class="active">Crear Proyecto</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection