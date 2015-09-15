@extends('admin_template')

@section('title')
Crear Perfil
@endsection

@section('active_general')
active
@endsection

@section('active_profile')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="{!! url('perfiles') !!}"></i> Perfiles</a>
    <li class="active">Crear Perfil</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection