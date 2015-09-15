<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{

	protected $table = 'profiles';
	public $timestamps = false;


	public function categories(){
        return $this->belongsTo('App\Models\Categories', 'categories_id');
    }
}