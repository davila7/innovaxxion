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
	<li><a href="{!! url('etapas') !!}"></i> Etapas</a>
    <li class="active">Crear Etapas</li>
@endsection

@section('content')
<div class="container-fluid">
    <p>
        {!! $edit !!} 
    </p>
</div>
@endsection