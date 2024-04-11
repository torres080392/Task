<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{

    public function run()
    {
        Roles::create([
            'id' => 1,
            'rol' => 'Administrador'

        ]);
        Roles::create([
            'id' => 2,
            'rol' => 'Usuario'
        ]);
    }
}
