<?php namespace App\Http\Controllers;

use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use App\Models\Profiles;
use App\Models\Categories;
use DB;

class ProfilesController extends Controller {

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
	public function ListaProfiles()
	{	
		$filter = DataFilter::source(Profiles::with('categories'));
		/*Header*/
        $filter->link('perfiles/create', 'Crear Nuevo', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->add('code','Buscar por Código', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('categories.name','Categoría', 'categories_id');
        $grid->add('name','Nombre', true);
        $grid->add('code','Código', true);
        $grid->add('monthly_cost','Consto Mensual', true);
        $grid->add('hours_cost_uf','Consto Hr UF', true);
        $grid->edit(url().'/perfiles/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

		return view('perfiles/lista', compact('filter', 'grid'));
	}


	 /**
	 * CRUD para areas impacto
	 *
	 * @return Response
	 */
	public function CrudProfiles(){

        $edit = DataEdit::source(new Profiles());
        $edit->link("/perfiles/","Lista Perfiles", "TR")->back();
        $edit->add('categories_id','Tipo','select')->options(Categories::lists('name', 'id'));
        $edit->add('name','Nombre', 'text')->rule('required');
        $edit->add('code','Código', 'text')->rule('required');
        $edit->add('monthly_cost','Código Mensual', 'text')->rule('required');
        $edit->add('hours_cost_uf','Costo Hr Uf', 'text')->rule('required');

        return $edit->view('perfiles/crud', compact('edit'));
    }

    public function getProfiles($id_activity_project){
    	$profiles_ids = DB::table('activity_profiles_project')
    						->where('id_activity_project', $id_activity_project)
    						->lists('id_profile');

    	$profiles = Profiles::whereIn('id', $profiles_ids)->get();

    	return response()->json($profiles);
    }

}
