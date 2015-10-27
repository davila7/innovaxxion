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

//etapas
Route::group(['prefix' => 'etapas'], function(){

	Route::get('/', 'EtapasController@ListaEtapas');
	Route::any('/create', 'EtapasController@CrudEtapas');
	Route::any('/edit', 'EtapasController@CrudEtapas');

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

//activity-profiles
Route::group(['prefix' => 'activity-profiles/{id_activity}'], function(){

	Route::get('/', 'EvaluationsController@ListaProfilesActivity');
	Route::any('/create', 'EvaluationsController@CrudProfilesActivity');
	Route::any('/edit', 'EvaluationsController@CrudProfilesActivity');

});


Route::get('toproyect', 'EvaluationsController@ToProyect');
