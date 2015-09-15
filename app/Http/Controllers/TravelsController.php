<?php namespace App\Http\Controllers;

use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use App\Models\Travels;

class TravelsController extends Controller {

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
	public function ListaTravels()
	{	
		$filter = DataFilter::source(new Travels);
		/*Header*/
        $filter->link('travels/create', 'Crear Nuevo', 'TR');
        /*Header*/

		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
		$filter->add('code','Buscar por Código', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');

		$grid = DataGrid::source($filter);
        $grid->attributes(array("class"=>"table table-striped"));
        $grid->add('name','Nombre', true);
        $grid->add('code','Código', true);
        $grid->add('viaticum','Viático', true);
        $grid->add('hotel','Hotel', true);
        $grid->add('gasoline','Pasaje/Bencina', true);
        $grid->add('taxi','Pasajes/Taxi', true);
        $grid->add('km','Kilometros', true);
        $grid->edit(url().'/travels/edit', 'Editar/Borrar','modify|delete');        
        $grid->paginate(10);

		return view('travels/lista', compact('filter', 'grid'));
	}


	 /**
	 * CRUD para travels
	 *
	 * @return Response
	 */
	public function CrudTravels(){

        $edit = DataEdit::source(new Travels());
        $edit->link("/travels/","Lista Travels", "TR")->back();
        $edit->add('name','Nombre', 'text')->rule('required');
        $edit->add('code','Código', 'text')->rule('required');
        $edit->add('viaticum','Viático', 'text')->rule('required');
        $edit->add('hotel','Hotel', 'text')->rule('required');
        $edit->add('gasoline','Pasaje/Bencina', 'text')->rule('required');
        $edit->add('taxi','Pasajes/Taxi', 'text')->rule('required');
        $edit->add('km','Kilometros', 'text')->rule('required');

        return $edit->view('travels/crud', compact('edit'));
    }

}
