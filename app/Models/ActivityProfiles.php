<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityProfiles extends Model
{

	protected $table = 'activity_profiles';
	public $timestamps = false;

	public function profile(){
        return $this->belongsTo('App\Models\Profiles', 'id_profile');
    }
}