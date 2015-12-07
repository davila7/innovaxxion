@extends('admin_template')

@section('title')
Usuarios
@endsection

@section('active_general')
active
@endsection

@section('active_users')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Asignar Rol Usuarios</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="inner">
	@if($errors->has())
        <div class='alert alert-danger'>
            @foreach ($errors->all('<p>:message</p>') as $message)
                [[ $message ]]
            @endforeach
        </div>
    @endif
    {!! \Form::open(array( 'url' => 'users/asignar', 'class' => 'form-horizontal')) !!}
    {!! \Form::hidden('user_id', $user->id ) !!}
		<div class="btn-toolbar" role="toolbar">
			<div class="pull-left">
				<h1>{!! $user->name !!}</h1>
			</div>
			<div class="pull-right">
				{!! HTML::link('users', 'Lista Usuarios', array('class'=>'btn btn-default')) !!}
			</div>
		</div>
		<br>
		<div class="form-group">
		<label class="col-sm-2 control-label required" > Roles</label>
		<div class="col-sm-10">
					<ul class="list-group">
					@forelse($roles as $r)
						  <li class="list-group-item">
						  	<div class="checkbox">
							  <label>
							    <input type="checkbox" name="role_user[]" value="{!! $r->id !!}"
							    @if (in_array($r->id, $user_role)) checked @endif
							    >
							    {!! $r->name !!}
							  </label>
							</div>
						  </li>
					@empty
					 <li class="list-group-item">
						No existen Roles
					</li>
					@endforelse
					</ul>
		</div>
		</div>
		<br>
		<div class="btn-toolbar" role="toolbar">
			<div class="pull-left">
			{!! Form::submit('Guardar', array('class' => 'btn btn-primary')) !!}
			</div>
		</div>
	{!! Form::close() !!}
	</div>
</div>
@endsection