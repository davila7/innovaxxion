<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{

	protected $table = 'perfiles';
	public $timestamps = false;


	public function categorias(){
        return $this->belongsTo('Models\Categorias', 'categoria_id');
    }
}