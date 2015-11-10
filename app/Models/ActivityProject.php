<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityProject extends Model
{

	protected $table = 'activity_project';
	public $timestamps = false;


	/*public function perfil(){
        return $this->hasOne('Profiles', 'categoria_id');
    }*/
}