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
use App\Models\Project;
use App\Models\EtapasProject;
use App\Models\ActivityProject;
use App\Models\ActivityProfilesProject;
use App\Models\ActivityProfiles;
use Illuminate\Http\Request;

class ProjectsController extends Controller {

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
	public function ListaProjects()
	{	
		$filter = DataFilter::source(new Project);
		/*Header*/
        $filter->link('projects/create', 'Crear Nuevo', 'TR');
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

		return view('projects/lista', compact('filter', 'grid'));
	}


	 /**
	 * CRUD para travels
	 *
	 * @return Response
	 */
	public function CrudProjects(){

        $edit = DataEdit::source(new Project());
        $edit->link("/projects/","Lista Proyectos", "TR")->back();
        $edit->add('name','Nombre', 'text')->rule('required');
        $edit->add('start_date', 'Fecha Comienzo', 'date')->format('d/m/Y', 'es');
        $edit->add('end_date', 'Fecha Fin', 'date')->format('d/m/Y', 'es');

        return $edit->view('projects/crud', compact('edit'));
    }


    public function ListaEtapasProjects($id_project)
	{	
		$project = Project::find($id_project);
		$filter = DataFilter::source(EtapasProject::where('id_project', $id_project));
		/*Header*/
        $filter->link('etapas-projects/'.$id_project.'/create/', 'Crear Nueva', 'TR');
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

		return view('projects/etapas/lista', compact('filter', 'grid', 'id_project', 'project'));
	}


	public function CrudEtapasProjects($id_project){

        $edit = DataEdit::source(new EtapasProject());
        $edit->link('etapas-projects/'.$id_project,"Lista Etapas", "TR")->back();
        $edit->add('id_project', 'id_project', 'hidden')->insertValue($id_project);
        $edit->add('etapa','Etapas','text')->rule('required');

        return $edit->view('projects/etapas/crud', compact('edit', 'id_project'));
    }


    public function ListaActivityEtapasProject($id_project, $id_etapa_project)
	{	
		$project = Project::find($id_project);
		$etapa_project = EtapasProject::find($id_etapa_project);
		$filter = DataFilter::source(ActivityProject::where('id_etapa_project', $id_etapa_project));
		/*Header*/
        $filter->link('activity-etapas-projects/'.$id_project.'/'.$id_etapa_project.'/create', 'Crear Nueva', 'TR');
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

		return view('projects/activity/lista', compact('filter', 'grid', 'id_project', 'id_etapa_project', 'project', 'etapa_project'));
	}

	public function CrudActivityEtapasProject($id_project, $id_etapa_project){

        $edit = DataEdit::source(new ActivityProject());
        $edit->link('activity-etapas-projects/'.$id_project.'/'.$id_etapa_project,"Lista Actividades", "TR")->back();
        $edit->add('name','Nombre','text')->rule('required');
        $edit->add('date_start', 'Fecha Comienzo', 'date')->format('d/m/Y', 'es');
        $edit->add('date_end', 'Fecha Fin', 'date')->format('d/m/Y', 'es');
        $edit->add('id_etapa_project', 'id_etapa_project', 'hidden')->insertValue($id_etapa_project);

        return $edit->view('projects/activity/crud', compact('edit', 'id_project', 'id_etapa_project'));
    }

    public function ListaProfilesActivityProject($id_activity_project)
	{	
		$activity = ActivityProject::find($id_activity_project);
		$filter = DataFilter::source(ActivityProfilesProject::with('profile')->where('id_activity_project', $id_activity_project));
		/*Header*/
        $filter->link('activity-profiles-project/'.$id_activity_project.'/create', 'Crear Nuevo', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('{{ $profile->name }}','Profile', 'id_profile');
        $grid->edit(url().'/activity-profiles-project/'.$id_activity_project.'/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

		return view('projects/activity/profiles/lista', compact('filter', 'grid', 'activity'));
	}

	public function CrudProfilesActivityProject($id_activity_project){

        $edit = DataEdit::source(new ActivityProfilesProject());
        $edit->link('activity-profiles-project/'.$id_activity_project,"Lista Actividades", "TR")->back();
        $edit->add('id_profile','Perfil','select')->options(Profiles::lists('name', 'id'));
        $edit->add('id_activity_project', 'id_activity_project', 'hidden')->insertValue($id_activity_project);

        return $edit->view('projects/activity/profiles/crud', compact('edit'));
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


    public function ToProyect($id){
    	
    	$evaluation = Evaluations::find($id);

    	$project = new Project;
		$project->name = $evaluation->name;
		$project->id_evaluation = $evaluation->id;
		$project->save();

		$etapas = EtapasEvaluations::where('id_evaluation', $id)->get();

		foreach($etapas as $etapa){
			$etapa_project = new EtapasProject;
			$etapa_project->id_project = $project->id;
			$etapa_project->etapa = $etapa->etapa;
			$etapa_project->save();

			$activity = Activity::where('id_etapa_evaluation', $etapa->id)->get();
			foreach($activity as $act){
				$activity_project = new ActivityProject;
				$activity_project->name = $act->name;
				$activity_project->id_etapa_project = $etapa_project->id;
				$activity_project->save();
				$activity_profile = ActivityProfiles::where('id_activity', $act->id)->get();
				foreach($activity_profile as $actprof){
					$activity_profiles_project = new ActivityProfilesProject;
					$activity_profiles_project->id_activity_project = $activity_project->id;
					$activity_profiles_project->id_profile = $actprof->id_profile;
					$activity_profiles_project->save();
				}
			}
		}


    }

    public function GetGantt($id){
    	
    	$project = Project::find($id);
    	$etapa_project = EtapasProject::where('id_project', $project->id)->get();

    	return view('projects/gantt', compact('project', 'etapa_project'));
    }

    public function UpdateActivityProject($start, $end, $id){
    	$activity_project = ActivityProject::find($id);
    	$activity_project->date_start = $start;
    	$activity_project->date_end = $end;
    	$activity_project->save();

    	return response()->json($end);
    }

}
