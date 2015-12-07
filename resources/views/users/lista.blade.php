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
    <li class="active">Usuarios</li>
@endsection

@section('content')
<div class="container-fluid">
	{!! $filter !!}
	<table class="table table-striped">
    <thead>
    <tr>
                 <th style="width:70px">
                                                <a href="{!! URL::to('/') !!}/users?ord=id">
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                                                    <a href="{!! URL::to('/') !!}/users?ord=-id">
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                                             ID
            </th>
                 <th>
                                                <a href="{!! URL::to('/') !!}/users?ord=name">
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                                                    <a href="{!! URL::to('/') !!}/users?ord=-name">
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                                             Nombre
            </th>
                 <th>
                                                <a href="{!! URL::to('/') !!}/users?ord=email">
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                                                    <a href="{!! URL::to('/') !!}/users?ord=-email">
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                                             Correo
            </th>
                 <th>
                            Asignar Rol
            </th>
            <th>
                Acciones
            </th>
         </tr>
    </thead>
    <tbody>
            @foreach ($grid->data as $item)
            <tr>
				<td>{!! $item->id !!}</td>
				<td>{!! $item->name !!}</td>
				<td>{!! $item->email !!}</td>
            	<td>
                    <a href="{!! URL::to('/') !!}/users/asignar/{!! $item->id !!}">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </td>
                <td>
                <a class="" title="Show" href="{!! URL::to('/') !!}/users/edit?show={!! $item->id !!}"><span class="glyphicon glyphicon-eye-open"> </span></a>
                <a class="" title="Modify" href="{!! URL::to('/') !!}/users/edit?modify={!! $item->id !!}"><span class="glyphicon glyphicon-edit"> </span></a>
                <a class="text-danger" title="Delete" href="{!! URL::to('/') !!}/users/edit?delete={!! $item->id !!}"><span class="glyphicon glyphicon-trash"> </span></a>
                </td>
        	</tr>
            @endforeach
        </tbody>
</table>
	 	{!! $grid->links() !!}
</div>
@endsection