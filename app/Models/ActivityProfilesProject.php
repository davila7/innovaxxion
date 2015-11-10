<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityProfilesProject extends Model
{

	protected $table = 'activity_profiles_project';
	public $timestamps = false;

	public function profile(){
        return $this->belongsTo('App\Models\Profiles', 'id_profile');
    }
}