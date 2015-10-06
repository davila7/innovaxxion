@extends('admin_template')

@section('title')
Etapas Evaluaciones
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection


@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('etapas-evaluations') !!}/{!! $id_evaluation !!}"></i> Etapas</a>
    <li class="active">Etapas Evaluaciones</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection