<?php

namespace Database\Seeders;

use App\Models\Funko;
use Illuminate\Database\Seeder;

class FunkosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Funko::create([
            'nombre' => 'Funko 1',
            'descripcion' => 'Funko de prueba 1',
            'imagen' => 'funko1.jpg',
            'precio' => 100,
            'cantidad' => 10,
            'categoria_id' => 'ca73bc62-607b-459d-b6c5-e9cc908cd336',
            'is_deleted' => false,
        ]);

        Funko::create([
            'nombre' => 'Funko 2',
            'descripcion' => 'Funko de prueba 2',
            'imagen' => 'funko2.jpg',
            'precio' => 200,
            'cantidad' => 20,
            'categoria_id' => 'ca73bc62-607b-459d-b6c5-e9cc9086d353',
            'is_deleted' => false,
        ]);

        Funko::create([
            'nombre' => 'Funko 3',
            'descripcion' => 'Funko de prueba 3',
            'imagen' => 'funko3.jpg',
            'precio' => 300,
            'cantidad' => 30,
            'categoria_id' => 'ca73bc62-607b-459d-b6c5-e9c6908cd353',
            'is_deleted' => false,
        ]);
    }
}
