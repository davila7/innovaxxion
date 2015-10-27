<?php namespace App\Http\Controllers;

use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use Zofe\Rapyd\Facades\DataSet;
use App\Models\Evaluations;
use App\Models\EtapasEvaluations;
use App\Models\Etapas;
use App\Models\Activity;
use App\Models\Profiles;
use App\Models\ActivityProfiles;

class EvaluationsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function ListaEvaluations()
	{	
		$filter = DataFilter::source(new Evaluations);
		/*Header*/
        $filter->link('evaluations/create', 'Crear Nuevo', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');
		$filter->build();

		$grid = DataSet::source($filter);
        //$grid->attributes(array("class"=>"table table-striped"));
        //$grid->edit(url().'/evaluations/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);
        $grid->build();

		return view('evaluations/lista', compact('filter', 'grid'));
	}


	 /**
	 * CRUD para travels
	 *
	 * @return Response
	 */
	public function CrudEvaluations(){

        $edit = DataEdit::source(new Evaluations());
        $edit->link("/evaluations/","Lista Evaluaciones", "TR")->back();
        $edit->add('name','Nombre', 'text')->rule('required');

        return $edit->view('evaluations/crud', compact('edit'));
    }


    public function ListaEtapasEvaluations($id_evaluation)
	{	
		$evaluation = Evaluations::find($id_evaluation);
		$filter = DataFilter::source(EtapasEvaluations::where('id_evaluation', $id_evaluation));
		/*Header*/
        $filter->link('etapas-evaluations/'.$id_evaluation.'/create/', 'Crear Nueva', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');
		$filter->build();

		$grid = DataSet::source($filter);
        //$grid->attributes(array("class"=>"table table-striped"));
        //$grid->edit(url().'/evaluations/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);
        $grid->build();

		return view('evaluations/etapas/lista', compact('filter', 'grid', 'id_evaluation', 'evaluation'));
	}


	public function CrudEtapasEvaluations($id_evaluation){

        $edit = DataEdit::source(new EtapasEvaluations());
        $edit->link('etapas-evaluations/'.$id_evaluation,"Lista Etapas", "TR")->back();
        $edit->add('id_evaluation', 'id_evaluation', 'hidden')->insertValue($id_evaluation);
        $edit->add('etapa','Etapas','select')->options(Etapas::lists('name', 'name'));

        return $edit->view('evaluations/etapas/crud', compact('edit', 'id_evaluation'));
    }


    public function ListaActivityEtapas($id_evaluation, $id_etapa_evaluation)
	{	
		$evaluation = Evaluations::find($id_evaluation);
		$etapa_evaluation = EtapasEvaluations::find($id_etapa_evaluation);
		$filter = DataFilter::source(Activity::where('id_etapa_evaluation', $id_etapa_evaluation));
		/*Header*/
        $filter->link('activity-etapas/'.$id_evaluation.'/'.$id_etapa_evaluation.'/create', 'Crear Nueva', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');
		$filter->build();

		$grid = DataSet::source($filter);
        //$grid->attributes(array("class"=>"table table-striped"));
        //$grid->edit(url().'/evaluations/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);
        $grid->build();

		return view('evaluations/activity/lista', compact('filter', 'grid', 'id_evaluation', 'evaluation', 'etapa_evaluation'));
	}

	public function CrudActivityEtapas($id_evaluation, $id_etapa_evaluation){

        $edit = DataEdit::source(new Activity());
        $edit->link('activity-etapas/'.$id_evaluation.'/'.$id_etapa_evaluation,"Lista Actividades", "TR")->back();
        $edit->add('name','Nombre','text')->rule('required');
        $edit->add('id_etapa_evaluation', 'id_etapa_evaluation', 'hidden')->insertValue($id_etapa_evaluation);

        return $edit->view('evaluations/etapas/crud', compact('edit', 'id_evaluation'));
    }

    public function ListaProfilesActivity($id_activity)
	{	
		$activity = Activity::find($id_activity);
		$filter = DataFilter::source(ActivityProfiles::with('profile')->where('id_activity', $id_activity));
		/*Header*/
        $filter->link('activity-profiles/'.$id_activity.'/create', 'Crear Nuevo', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('{{ $profile->name }}','Profile', 'id_profile');
        $grid->edit(url().'/activity-profiles/'.$id_activity.'/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

		return view('evaluations/activity/profiles/lista', compact('filter', 'grid', 'activity'));
	}

	public function CrudProfilesActivity($id_activity){

        $edit = DataEdit::source(new ActivityProfiles());
        $edit->link('activity-profiles/'.$id_activity,"Lista Actividades", "TR")->back();
        $edit->add('id_profile','Perfil','select')->options(Profiles::lists('name', 'id'));
        $edit->add('id_activity', 'id_activity', 'hidden')->insertValue($id_activity);

        return $edit->view('evaluations/activity/profiles/crud', compact('edit', 'id_evaluation'));
    }

}
