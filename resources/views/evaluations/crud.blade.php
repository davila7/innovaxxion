@extends('admin_template')

@section('title')
Evaluaciones
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection


@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('evaluations') !!}"></i> Evaluaciones</a>
    <li class="active">Crear Evaluaciones</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection