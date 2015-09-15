<?php namespace App\Http\Controllers;

use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use App\Models\Etapas;

class EtapasController extends Controller {

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
	public function ListaEtapas()
	{	
		$filter = DataFilter::source(new Etapas);
		/*Header*/
        $filter->link('etapas/create', 'Crear Nueva', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('name','Nombre', true);
        $grid->add('fase','Fase', true);
        $grid->edit(url().'/etapas/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

		return view('etapas/lista', compact('filter', 'grid'));
	}


	 /**
	 * CRUD para etapas
	 *
	 * @return Response
	 */
	public function CrudEtapas(){

        $edit = DataEdit::source(new Etapas());
        $edit->link("/etapas/","Lista Etapas", "TR")->back();
        $edit->add('name','Nombre', 'text')->rule('required');
        $edit->add('fase','Fase', 'text')->rule('required');

        return $edit->view('etapas/crud', compact('edit'));
    }

}
