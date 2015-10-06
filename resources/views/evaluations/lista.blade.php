@extends('admin_template')

@section('title')
Evaluaciones
@endsection

@section('active_general')
active
@endsection

@section('active_evaluations')
active
@endsection

@section('sitemap')
	<li><a href="{!! url('home') !!}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Evaluations</li>
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
                                                <a href="{!! URL::to('/') !!}/evaluations?ord=name">
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                                                    <a href="{!! URL::to('/') !!}/evaluations?ord=-name">
                        <span class="glyphicon glyphicon-arrow-down"></span>
                    </a>
                                             Nombre
            </th>
                        <th>
                 Etapas
            </th>
                 <th>
                            Editar/Borrar
            </th>
            <th>
                Pasar a Proyecto
            </th>
         </tr>
    </thead>
    <tbody>	
    @foreach ($grid->data as $item)
            <tr>
                        <td>{!! $item->name !!}</td>
                        <td>
                        	<a class="" title="Etapas" href="{!! URL::to('/') !!}/etapas-evaluations/{!! $item->id !!}"><span class="glyphicon glyphicon-th-list"> </span></a>
                        </td>
                        <td><a class="" title="Modify" href="{!! URL::to('/') !!}/evaluations/edit?modify={!! $item->id !!}"><span class="glyphicon glyphicon-edit"> </span></a>
    					<a class="text-danger" title="Delete" href="{!! URL::to('/') !!}/evaluations/edit?delete={!! $item->id !!}"><span class="glyphicon glyphicon-trash"> </span></a>
						</td>
                        <td>
                            <a class="" title="Pasar a Proyecto" href="{!! URL::to('/') !!}/toproyect/{!! $item->id !!}"><span class="glyphicon glyphicon-share-alt"> </span></a>
                        </td>
            </tr>
    @endforeach
        </tbody>
	</table>

{!! $grid->links() !!}
</div>
@endsection