@extends('admin_template')

@section('title')
Crear Gasto General
@endsection

@section('active_general')
active
@endsection

@section('active_overall_cost')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('overall_cost') !!}"></i> Gastos Generales</a>
    <li class="active">Crear Gasto General</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection