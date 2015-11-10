@extends('admin_template')

@section('title')
Etapas 
Proyecto: <strong>{!! $project->name !!}</strong>
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{!! url('evaluations') !!}"> Proyectos</a></li>
    <li class="active">Etapas Proyectos</li>
@endsection

@section('content')
    <div class="section-header">
      <div class="elements one">
        <div class="element">
          {!! $filter !!}
        </div>
      </div>
    </div>

    <div class="section-content">
    <table class="table table-striped">
    <thead>
            <tr>
                 <th>
                                             Nombre
            </th>
                        <th>
                 Actividades
            </th>
                 <th>
                            Editar/Borrar
            </th>
         </tr>
    </thead>
    <tbody>	
    @foreach ($grid->data as $item)
            <tr>
                        <td>{!! $item->etapa !!}</td>
                        <td>
                        	<a class="" title="Actividad" href="{!! URL::to('/') !!}/activity-etapas-projects/{!! $id_project !!}/{!! $item->id !!}"><span class="glyphicon glyphicon-list"> </span></a>
                        </td>
                        <td><a class="" title="Modify" href="{!! URL::to('/') !!}/etapas-projects/{!! $id_project !!}?modify={!! $item->id !!}"><span class="glyphicon glyphicon-edit"> </span></a>
    					<a class="text-danger" title="Delete" href="{!! URL::to('/') !!}/etapas-projects/{!! $id_project !!}?delete={!! $item->id !!}"><span class="glyphicon glyphicon-trash"> </span></a>
						</td>
            </tr>
    @endforeach
        </tbody>
	</table>

{!! $grid->links() !!}
</div>
@endsection