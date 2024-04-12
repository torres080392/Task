<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([

            'name' => 'Soporte nivel 1',
            'descripcion' => 'Mantenimiento preventivo y correctivo'

        ]);

        Categoria::create([

            'name' => 'Soporte nivel 2',
            'descripcion' => 'Soporte a softawe de la empresa'

        ]);
        Categoria::create([

            'name' => 'Soporte nivel 3',
            'descripcion' => 'Consultas a bases de datos de sistemas'

        ]);
    }
}
