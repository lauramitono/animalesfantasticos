<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipo_usuario', 'img_users', 'apellido'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	public function criaturas(){
		return $this->hasMany(Criatura::class, 'id_user', 'id' );
	}

	public function comentarios(){
		return $this->hasMany(Comentario::class, 'id_user', 'id');
	}
	
	/** @var array reglas de validación */
	public static $rules = [
		'name' => 'required|min:3|max:100',
		'imagen' => 'sometimes|image',
		//sometimes= no es obligatorio que cargue algo pero tiene que cargar lo que le dejo cargar, en este caso imagen
	];
}
