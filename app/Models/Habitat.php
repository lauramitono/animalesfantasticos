<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    //indico el nombre de la tabla y la PK
	
	/** @var string habitats */
	protected $table = "habitats";
	
	/** @var string PK */
	protected $primaryKey = "id_habitat";
	
	public function criaturas()
    {
    	return $this->hasMany(Criatura::class, 'id_habitat', 'id_habitat');
    }
}
