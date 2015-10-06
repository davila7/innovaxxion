<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

	protected $table = 'activity';
	public $timestamps = false;


	/*public function perfil(){
        return $this->hasOne('Profiles', 'categoria_id');
    }*/
}