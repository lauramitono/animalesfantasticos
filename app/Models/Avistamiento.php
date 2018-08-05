<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avistamiento extends Model
{
    /** @var string avistamientos */
	protected $table = "avistamientos";
	
	/** @var string PK */
	protected $primaryKey = "id_avistamiento";
	
	/** @var array Los campos que se pueden cargar de manera masiva */
    protected $fillable = ['lugar', 'apariencia'];
	
	/** @var array reglas de validación */
	public static $rules = [
		'lugar' => 'required|min:5|max:100',
		'apariencia' => 'required|min:5'
	];
}
