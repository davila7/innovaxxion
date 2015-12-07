@extends('admin_template')

@section('title')
Crear Viaje
@endsection

@section('active_general')
active
@endsection

@section('active_users')
active
@endsection


@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('users') !!}"></i> Usuarios</a>
    <li class="active">Mantenedor Usuarios</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection