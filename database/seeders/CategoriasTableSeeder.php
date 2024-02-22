<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Categoria::create([
            'id' => 'ca73bc62-607b-459d-b6c5-e9cc908cd336',
            'nombre' => 'Categoria 1',
            'is_deleted' => false,
        ]);

        Categoria::create([
            'id' => 'ca73bc62-607b-459d-b6c5-e9cc9086d353',
            'nombre' => 'Categoria 2',
            'is_deleted' => false,
        ]);

        Categoria::create([
            'id' => 'ca73bc62-607b-459d-b6c5-e9c6908cd353',
            'nombre' => 'Categoria 3',
            'is_deleted' => false,
        ]);
    }
}
