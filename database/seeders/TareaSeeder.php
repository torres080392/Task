<?php

namespace Database\Seeders;

use App\Models\Tarea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tarea::create([
            'users_id' => 1,
            'categoria_id' => 2,
            'descripcion' =>  'Por favor validar mi equipo Laptop dado que no enciende '

        ]);
    }
}
