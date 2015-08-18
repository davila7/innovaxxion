<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{

	protected $table = 'categorias';
	public $timestamps = false;


	public function perfil(){
        return $this->hasOne('Models\Categorias', 'categoria_id');
    }
}