<?php

use Illuminate\Database\Seeder;
use Syscover\Forem\Models\Province;

class ForemProvinceSeeder extends Seeder
{
    public function run()
    {
        Province::insert([
            ['name' => 'Álava',         'code' => 1],
            ['name' => 'Alvacete',      'code' => 2],
            ['name' => 'Alicante',      'code' => 3],
            ['name' => 'Almería',       'code' => 4],
            ['name' => 'Asturias',      'code' => 33],
            ['name' => 'Ávila',         'code' => 5],
            ['name' => 'Badajoz',       'code' => 6],
            ['name' => 'Baleares',      'code' => 7],
            ['name' => 'Barcelona',     'code' => 8],
            ['name' => 'Burgos',        'code' => 9],
            ['name' => 'Cáceres',       'code' => 10],
            ['name' => 'Cádiz',         'code' => 11],
            ['name' => 'Cantabria',     'code' => 39],
            ['name' => 'Castellón',     'code' => 12],
            ['name' => 'Ceuta',         'code' => 51],
            ['name' => 'Ciudad Real',   'code' => 13],
            ['name' => 'Córdoba',       'code' => 14],
            ['name' => 'Coruña (La)',   'code' => 15],
            ['name' => 'Cuenca',        'code' => 16],
            ['name' => 'Gerona',        'code' => 17],
            ['name' => 'Granada',       'code' => 18],
            ['name' => 'Guadalajara',   'code' => 19],
            ['name' => 'Guipuzcoa',     'code' => 20],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemProvinceSeeder"
 */
