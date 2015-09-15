<?php namespace App\Http\Controllers;

use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use App\Models\OverallCost;

class OverallCostController extends Controller {

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
	public function ListaOverallCost()
	{	
		$filter = DataFilter::source(new OverallCost);
		/*Header*/
        $filter->link('overall_cost/create', 'Crear Nuevo', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('name','Gastos de Administración', true);
        $grid->add('cost','Total Mensual', true);
        $grid->edit(url().'/overall_cost/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

		return view('overallcost/lista', compact('filter', 'grid'));
	}


	 /**
	 * CRUD para travels
	 *
	 * @return Response
	 */
	public function CrudOverallCost(){

        $edit = DataEdit::source(new OverallCost());
        $edit->link("/overall_cost/","Lista Gastos Generales", "TR")->back();
        $edit->add('name','Gastos de Administración', 'text')->rule('required');
        $edit->add('cost','Total Mensual', 'text')->rule('required');

        return $edit->view('overallcost/crud', compact('edit'));
    }

}
