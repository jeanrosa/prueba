<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Creacioón de Categorias  
        /*
        DB::table('categories')->insert([
            'description' => 'general',
        ]);

        DB::table('categories')->insert([
            'description' => 'cronicas',
        ]);

        //Creación de Roles
        DB::table('rols')->insert([
            'description' => 'administrador',
        ]);

        DB::table('rols')->insert([
            'description' => 'autor'
        ]);

        DB::table('rols')->insert([
            'description' => 'suscriptor',
        ]);
        */
    
        //Creación de Usuario admin
        DB::table('users')->insert([
            'name' => 'autor',
            'email' => 'autor@autor.com',
            'rol_id' => '2',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'suscriptor',
            'email' => 'suscriptor@suscriptor.com',
            'rol_id' => '3',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'autor2',
            'email' => 'autor2@autor.com',
            'rol_id' => '2',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'suscriptor2',
            'email' => 'suscriptor2@suscriptor.com',
            'rol_id' => '3',
            'password' => Hash::make('123456'),
        ]);

        DB::table('users')->insert([
            'name' => 'suscriptor3',
            'email' => 'suscriptor3@suscriptor.com',
            'rol_id' => '3',
            'password' => Hash::make('123456'),
        ]);
    }
}
