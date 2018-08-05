<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comentario extends Model
{
    //indico el nombre de la tabla y la PK
	
	/** @var string comentarios */
	protected $table = "comentarios";
	
	/** @var string PK */
	protected $primaryKey = "id_comentario";
	
	/** @var array Los campos que se pueden cargar de manera masiva */
    protected $fillable = ['comentario', 'id_criatura', 'id_user'];
	
	/** @var array reglas de validación */
	public static $rules = [
		'comentario' => 'required|min:5|max:255',
	];
	
	//relaciono el comentario con la criatura
	public function criatura(){
		return $this->belongsTo(Criatura::class, 'id_criatura', 'id_criatura' );
	}
	
	//relaciono el comentario con el usuario
	public function usuario(){
		return $this->belongsTo(User::class, 'id_user', 'id' );
	}
}
