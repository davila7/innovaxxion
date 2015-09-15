@extends('admin_template')

@section('title')
Costos Viajes
@endsection

@section('active_general')
active
@endsection

@section('active_travels')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Viajes</li>
@endsection

@section('content')
<div class="container-fluid">
	{!! $filter !!}
	{!! $grid !!}
</div>
@endsection