<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('admin', function () {
    return view('admin_template');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//perfiles
Route::group(['prefix' => 'perfiles'], function(){

	Route::get('/getPerfil/{id}', 'ProfilesController@getProfiles');
	Route::get('/', 'ProfilesController@ListaProfiles');
	Route::any('/create', 'ProfilesController@CrudProfiles');
	Route::any('/edit', 'ProfilesController@CrudProfiles');

});

//viajes
Route::group(['prefix' => 'travels'], function(){

	Route::get('/', 'TravelsController@ListaTravels');
	Route::any('/create', 'TravelsController@CrudTravels');
	Route::any('/edit', 'TravelsController@CrudTravels');

});

//costos generales
Route::group(['prefix' => 'overall_cost'], function(){

	Route::get('/', 'OverallCostController@ListaOverallCost');
	Route::any('/create', 'OverallCostController@CrudOverallCost');
	Route::any('/edit', 'OverallCostController@CrudOverallCost');

});

//evaluaciones
Route::group(['prefix' => 'evaluations'], function(){

	Route::get('/', 'EvaluationsController@ListaEvaluations');
	Route::any('/create', 'EvaluationsController@CrudEvaluations');
	Route::any('/edit', 'EvaluationsController@CrudEvaluations');

});

//evaluaciones
Route::group(['prefix' => 'projects'], function(){

	Route::get('/', 'ProjectsController@ListaProjects');
	Route::any('/create', 'ProjectsController@CrudProjects');
	Route::any('/edit', 'ProjectsController@CrudProjects');

});

//etapas
Route::group(['prefix' => 'etapas'], function(){

	Route::get('/', 'EtapasController@ListaEtapas');
	Route::any('/create', 'EtapasController@CrudEtapas');
	Route::any('/edit', 'EtapasController@CrudEtapas');

});

//etapas-proyectos
Route::group(['prefix' => 'etapas-projects/{id}'], function(){

	Route::get('/', 'ProjectsController@ListaEtapasProjects');
	Route::any('/create', 'ProjectsController@CrudEtapasProjects');
	Route::any('/edit', 'ProjectsController@CrudEtapasProjects');

});

//etapas-evaluations
Route::group(['prefix' => 'etapas-evaluations/{id}'], function(){

	Route::get('/', 'EvaluationsController@ListaEtapasEvaluations');
	Route::any('/create', 'EvaluationsController@CrudEtapasEvaluations');
	Route::any('/edit', 'EvaluationsController@CrudEtapasEvaluations');

});

//activity-etapas
Route::group(['prefix' => 'activity-etapas/{id_evaluation}/{id_etapa_evaluation}'], function(){

	Route::get('/', 'EvaluationsController@ListaActivityEtapas');
	Route::any('/create', 'EvaluationsController@CrudActivityEtapas');
	Route::any('/edit', 'EvaluationsController@CrudActivityEtapas');

});

//activity-etapas-projects
Route::group(['prefix' => 'activity-etapas-projects/{id_project}/{id_etapa_project}'], function(){

	Route::get('/', 'ProjectsController@ListaActivityEtapasProject');
	Route::any('/create', 'ProjectsController@CrudActivityEtapasProject');
	Route::any('/edit', 'ProjectsController@CrudActivityEtapasProject');

});

//activity-profiles-project
Route::group(['prefix' => 'activity-profiles-project/{id_activity_project}'], function(){

	Route::get('/', 'ProjectsController@ListaProfilesActivityProject');
	Route::any('/create', 'ProjectsController@CrudProfilesActivityProject');
	Route::any('/edit', 'ProjectsController@CrudProfilesActivityProject');

});

//activity-profiles
Route::group(['prefix' => 'activity-profiles/{id_activity}'], function(){

	Route::get('/', 'EvaluationsController@ListaProfilesActivity');
	Route::any('/create', 'EvaluationsController@CrudProfilesActivity');
	Route::any('/edit', 'EvaluationsController@CrudProfilesActivity');

});

//users
Route::group(['prefix' => 'users'], function(){

	Route::get('/', 'UserController@ListUsers');
	Route::get('/asignar/{id}', 'UserController@AsignarRolGet');
	Route::any('/create', 'UserController@CrudUser');
	Route::any('/edit', 'UserController@CrudUser');
	Route::post('/asignar', 'UserController@AsignarRolPost');

});


Route::get('toproyect/{id_proyect}', 'EvaluationsController@ToProyect');

Route::get('gantt-projects/{id_proyect}', 'ProjectsController@GetGantt');
Route::get('download-excel/{id_proyect}', 'ProjectsController@DownloadExcel');
Route::get('update-dates/{start}/{end}/{id}', 'ProjectsController@UpdateActivityProject');



Route::get('create-role', 'UserController@CreateRoles');
