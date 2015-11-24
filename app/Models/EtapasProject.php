<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EtapasProject extends Model
{

	protected $table = 'etapas_project';
	public $timestamps = false;

	public function activity_project(){
        return $this->HasMany('App\Models\ActivityProject', 'id_etapa_project');
    }

}