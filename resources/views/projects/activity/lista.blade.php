@extends('admin_template')

@section('title')
Actividades <br/>
Proyecto: <strong>{!! $project->name !!}</strong><br/>
Etapa: <strong>{!! $etapa_project->etapa !!}</strong>
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{!! url('projects') !!}"> Proyecto</a></li>
    <li><a href="{!! url('etapas-projects') !!}/{!! $id_project !!}"> Etapas Proyecto</a></li>
    <li class="active">Actividades</li>
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
                 Perfiles
            </th>
                 <th>
                            Editar/Borrar
            </th>
         </tr>
    </thead>
    <tbody>	
    @foreach ($grid->data as $item)
            <tr>
                        <td>{!! $item->name !!}</td>
                        <td>
                        	<a class="" title="Actividad" href="{!! URL::to('/') !!}/activity-profiles/{!! $item->id !!}"><span class="glyphicon glyphicon-user"> </span></a>
                        </td>
                        <td><a class="" title="Modify" href="{!! URL::to('/') !!}/etapas-projects/edit?modify={!! $item->id !!}"><span class="glyphicon glyphicon-edit"> </span></a>
    					<a class="text-danger" title="Delete" href="{!! URL::to('/') !!}/etapas-projects/edit?delete={!! $item->id !!}"><span class="glyphicon glyphicon-trash"> </span></a>
						</td>
            </tr>
    @endforeach
        </tbody>
	</table>

{!! $grid->links() !!}
</div>
@endsection