@extends('admin_template')

@section('title')
Gastos Generales
@endsection

@section('active_general')
active
@endsection

@section('active_overall_cost')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Gastos Generales</li>
@endsection

@section('content')
<div class="container-fluid">
	{!! $filter !!}
	{!! $grid !!}
</div>
@endsection