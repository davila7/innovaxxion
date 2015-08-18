<?php namespace App\Http\Controllers;

use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use App\Models\Perfiles;

class PerfilesController extends Controller {

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
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function ListaPerfiles()
	{	
		$filter = DataFilter::source(Perfiles::with('categorias'));

		/*Header*/
        $filter->link('perfiles/create', 'Crear Nuevo', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('SL56_DOCUMENTO','Buscar por documento', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('categorias.nombre','Categoría', 'categoria_id');
        $grid->add('nombre','Nombre', true);
        $grid->add('codigo','Código', true);
        $grid->add('costo_mensual','Consto Mensual', true);
        $grid->add('costo_hr_uf','Consto Hr UF', true);
        $grid->edit(url().'/perfiles/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

		return view('perfiles/lista', compact('filter', 'grid'));
	}


	 /**
	 * CRUD para areas impacto
	 *
	 * @return Response
	 */
	public function CrudPerfiles(){

        $edit = DataEdit::source(new Perfiles());
        $edit->link("/perfiles/","Lista Areas de Impacto", "TR")->back();
        $edit->add('nombre','Nombre', 'text')->rule('required');
        $edit->add('codigo','Código', 'text')->rule('required');
        $edit->add('costo_mensual','Código Mensual', 'text')->rule('required');
        $edit->add('costo_hr_uf','Costo Hr Uf', 'text')->rule('required');

        return $edit->view('perfiles/crud', compact('edit'));
    }

}
