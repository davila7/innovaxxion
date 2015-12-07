<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityProject extends Model
{

	protected $table = 'activity_project';
	public $timestamps = false;


	public function activity_profile(){
        return $this->hasMany('App\Models\ActivityProfilesProject', 'id_activity_project');
    }
}