<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuarios iniciales
		User::create([
			'name' => 'Newt',
			'email' => 'newt@criaturas.com.ar',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/NewtonScamander.jpg',
			'apellido' => 'Scamander',
			'tipo_usuario' => 'admin',
			'estado' => 'activo',
			'created_at' => '2018-05-16 18:27:58'
		]);
		User::create([
			'name' => 'Porpentina',
			'email' => 'porpentina@criaturas.com.ar',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/PorpentinaGoldstein.jpg',
			'apellido' => 'Goldstein',
			'tipo_usuario' => 'admin',
			'estado' => 'activo',
			'created_at' => '2018-05-16 18:27:58'
		]);
		User::create([
			'name' => 'Queenie',
			'email' => 'queenie@criaturas.com.ar',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/QueenieGoldstein.jpg',
			'apellido' => 'Goldstein',
			'tipo_usuario' => 'admin',
			'estado' => 'activo',
			'created_at' => '2018-05-16 18:27:58'
		]);
		User::create([
			'name' => 'Jacob',
			'email' => 'jacob@criaturas.com.ar',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/JacobKowalski.jpg',
			'apellido' => 'Kowalski',
			'tipo_usuario' => 'admin',
			'estado' => 'activo',
			'created_at' => '2018-05-16 18:27:58'
		]);
		User::create([
			'name' => 'Neville',
			'email' => 'neville@mago.com',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/NevilleLongbottom.jpg',
			'apellido' => 'Longbottom',
			'tipo_usuario' => 'mago',
			'estado' => 'activo',
			'created_at' => '2018-06-10 18:27:58'
		]);
		User::create([
			'name' => 'Ron',
			'email' => 'ron@mago.com',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/RonWeasley.jpg',
			'apellido' => 'Weasley',
			'tipo_usuario' => 'mago',
			'estado' => 'suspendido',
			'created_at' => '2018-06-11 18:27:58'
		]);
		User::create([
			'name' => 'Hermione',
			'email' => 'hermione@mago.com',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/HermioneGranger.jpg',
			'apellido' => 'Granger',
			'tipo_usuario' => 'mago',
			'estado' => 'activo',
			'created_at' => '2018-06-12 18:27:58'
		]);
		User::create([
			'name' => 'Luna',
			'email' => 'luna@mago.com',
			'password' => \Hash::make('123'),
			'apellido' => 'Lovegood',
			'tipo_usuario' => 'mago',
			'estado' => 'activo',
			'created_at' => '2018-06-13 18:27:58'
			
		]);
		User::create([
			'name' => 'Seraphina',
			'email' => 'madameseraphina@mago.com',
			'password' => \Hash::make('123'),
			'apellido' => 'Picquery',
			'tipo_usuario' => 'mago',
			'estado' => 'activo',
			'created_at' => '2018-06-14 18:27:58'
			
		]);
		User::create([
			'name' => 'Lavender',
			'email' => 'lavender@mago.com',
			'password' => \Hash::make('123'),
			'apellido' => 'Brown',
			'tipo_usuario' => 'mago',
			'estado' => 'suspendido',
			'created_at' => '2018-06-15 18:27:58'	
		]);
		User::create([
			'name' => 'Sirius',
			'email' => 'sirius@mago.com',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/SiriusBlack.jpg',
			'apellido' => 'Black',
			'tipo_usuario' => 'mago',
			'estado' => 'activo',
			'created_at' => '2018-06-16 18:27:58'
			
		]);
		User::create([
			'name' => 'Minerva',
			'email' => 'profesoraminerva@mago.com',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/MinervaMcGonagall.jpg',
			'apellido' => 'McGonagall',
			'tipo_usuario' => 'mago',
			'estado' => 'activo',
			'created_at' => '2018-06-17 18:27:58'
			
		]);
		User::create([
			'name' => 'Rubeus',
			'email' => 'elgrandehagrid@mago.com',
			'password' => \Hash::make('123'),
			'img_users' => 'imagenes/RubeusHagrid.png',
			'apellido' => 'Hagrid',
			'tipo_usuario' => 'mago',
			'estado' => 'activo',
			'created_at' => '2018-06-18 18:27:58'	
		]);
		User::create([
			'name' => 'Nymphadora',
			'email' => 'nymphadora@mago.com',
			'password' => \Hash::make('123'),
			'apellido' => 'Tonks',
			'tipo_usuario' => 'mago',
			'estado' => 'suspendido',
			'created_at' => '2018-06-19 18:27:58'		
		]);
    }
}

//los created_at los puse manuales para poder generar estadísticas en el panel