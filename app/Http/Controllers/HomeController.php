<?php namespace App\Http\Controllers;

use App\Models\Profiles;
use App\Models\Travels;
use App\Models\OverallCost;
use App\Models\Etapas;

class HomeController extends Controller {

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
	public function index()
	{	
		$count_profiles = Profiles::count();
		$count_travels = Travels::count();
		$count_overallcost = OverallCost::count();
		$count_etapas = Etapas::count();
		return view('home')->with('count_profiles', $count_profiles)
							->with('count_travels', $count_travels)
							->with('count_etapas', $count_etapas)
							->with('count_overallcost', $count_overallcost);
	}

}
