<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'email' => 'mail@email.com',
            'password' => bcrypt('password'),
            'nivel' => 0,
            'nombre' => 'Desarrollador',
            'apellido' => 'Laravel',
            'telefono' => '000-0000000',
            'dni' => 1000000001,
            'birthday' => '1970-02-01',
            'id_ciudad' => 1424
        ]);
    }
}
