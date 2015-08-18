@extends('app')

@section('title')
Perfiles
@endsection

@section('content')
<div class="container-fluid">
	{!! $filter !!}
	{!! $grid !!}
</div>
@endsection