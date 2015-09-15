@extends('admin_template')

@section('title')
Etapas
@endsection

@section('active_general')
active
@endsection

@section('active_etapas')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Etapas</li>
@endsection

@section('content')
<div class="container-fluid">
	{!! $filter !!}
	{!! $grid !!}
</div>
@endsection