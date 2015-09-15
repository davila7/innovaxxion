@extends('admin_template')

@section('title')
Crear Viaje
@endsection

@section('active_general')
active
@endsection

@section('active_travels')
active
@endsection


@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('travels') !!}"></i> Viajes</a>
    <li class="active">Crear Viaje</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection