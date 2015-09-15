<?php namespace App\Http\Controllers;

use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use App\Models\Evaluations;

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

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('name','Nombre', true);
        $grid->edit(url().'/evaluations/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

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

}
