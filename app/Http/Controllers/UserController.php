<?php namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use DB;
use App\Models\Permission;
use App\Http\Requests\AddRoleForm;
use App\Http\Requests;
use Zofe\Rapyd\Facades\DataFilter;
use Zofe\Rapyd\Facades\DataGrid;
use Zofe\Rapyd\Facades\DataEdit;
use Zofe\Rapyd\Facades\DataSet;

class UserController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Actualizaciones Controller
	|--------------------------------------------------------------------------
	|
	| DESCRIPCION DEL CONTROLLER
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


    public function CreateRoles(){
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();
    }

	/**
	 * Muestra lista de productos
	 *
	 * @return Response
	 */
	public function ListUsers(){
		$filter = DataFilter::source(new User);
        $filter->link("users/create","Crear Nuevo", "TR");
		$filter->attributes(array('class'=>'form-inline'));
		$filter->add('name','Buscar por Nombre', 'text');
        $filter->add('email','Buscar por Email', 'text');
		$filter->submit('Buscar');
		$filter->reset('Limpiar');
        $filter->build();

		$grid = DataSet::source($filter);
        $grid->paginate(10);
        $grid->build();

		return view('users/lista', compact('filter', 'grid'));
	}

     /**
     * CRUD para usuarios
     *
     * @return Response
     */
    public function CrudUser(){

        $edit = DataEdit::source(new User());

        $edit->link("/users","Lista Usuarios", "TR")->back();
        $edit->add('name','Nombre', 'text')->rule('required');
        $edit->add('email','Email', 'text')->rule('required');
        $edit->add('password','Password', 'password')->rule('required');

        return $edit->view('users/crud', compact('edit'));
    }

    /**
	 * Asigna Rol Get
	 *
	 * @return Response
	 */
	public function AsignarRolGet($id = null){
        if($id){
            $user = User::find($id);
        if(isset($user)){
            $user_role = DB::table('role_user')
        			->where('user_id', $id)
        			->lists('role_id');
            $roles = DB::table('roles')->get();
            return view('users/asignar')->with('user', $user)
            								->with('roles', $roles)
            								->with('user_role', $user_role); 
        }else{
            return redirect('/admin');
        }
        }else{
            return redirect('/admin');
        }       
    }

    /**
     * Asigna Rol Post
     *
     * @return Response
     */
    public function AsignarRolPost(AddRoleForm $request){
        $id = $request->input('user_id');
        $role_user = $request->input('role_user');
        $user = User::find($id);

        $rol_user = DB::table('role_user')
                    ->where('user_id', $id)
                    ->delete();

        if($role_user){
            foreach ($role_user as $ru) {
                $role = Role::findOrFail($ru);
                DB::table('role_user')->insert(
                    array('user_id' => $id, 'role_id' => $ru)
                );
                //$user->roles()->attach($role->id);
                //$user->attachRole($role);
            }
        }

        
        return redirect('users');
    }
}