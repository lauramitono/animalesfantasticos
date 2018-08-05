<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(HabitatsTableSeeder::class);
		$this->call(CriaturasTableSeeder::class);
		$this->call(UsersTableSeeder::class);
		$this->call(AvistamientosTableSeeder::class);
		$this->call(ComentariosTableSeeder::class);
    }
}
