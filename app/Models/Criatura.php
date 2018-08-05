<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criatura extends Model
{
    //indico el nombre de la tabla y la PK
	
	/** @var string criaturas */
	protected $table = "criaturas";
	
	/** @var string PK */
	protected $primaryKey = "id_criatura";
	
	/** @var array Los campos que se pueden cargar de manera masiva */
	//De esta forma evito que me mande campos indeseados
    protected $fillable = ['nombre_criatura', 'apariencia', 'habilidades_magicas', 'peligros', 'id_habitat', 'imagen'];
	
	/** @var array reglas de validación */
	public static $rules = [
		'nombre_criatura' => 'required|min:5|max:100',
		'apariencia' => 'required|min:5',
		//'imagen' => 'sometimes|image',
		//sometimes= no es obligatorio que cargue algo pero tiene que cargar lo que le dejo cargar, en este caso imagen
	];
	
	public function habitat(){
		return $this->belongsTo(Habitat::class, 'id_habitat', 'id_habitat');
	}
	
	public function comentarios(){
		return $this->hasMany(Comentario::class, 'id_criatura', 'id_criatura');
	}
	
}
