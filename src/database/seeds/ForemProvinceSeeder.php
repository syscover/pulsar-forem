<?php

use Illuminate\Database\Seeder;
use Syscover\Forem\Models\Province;

class ForemProvinceSeeder extends Seeder
{
    public function run()
    {
        Province::insert([
            ['name' => 'Álava',                     'code' => 1],
            ['name' => 'Albacete',                  'code' => 2],
            ['name' => 'Alicante',                  'code' => 3],
            ['name' => 'Almería',                   'code' => 4],
            ['name' => 'Asturias',                  'code' => 33],
            ['name' => 'Ávila',                     'code' => 5],
            ['name' => 'Badajoz',                   'code' => 6],
            ['name' => 'Baleares',                  'code' => 7],
            ['name' => 'Barcelona',                 'code' => 8],
            ['name' => 'Burgos',                    'code' => 9],
            ['name' => 'Cáceres',                   'code' => 10],
            ['name' => 'Cádiz',                     'code' => 11],
            ['name' => 'Cantabria',                 'code' => 39],
            ['name' => 'Castellón',                 'code' => 12],
            ['name' => 'Ceuta',                     'code' => 51],
            ['name' => 'Ciudad Real',               'code' => 13],
            ['name' => 'Córdoba',                   'code' => 14],
            ['name' => 'Coruña (La)',               'code' => 15],
            ['name' => 'Cuenca',                    'code' => 16],
            ['name' => 'Gerona',                    'code' => 17],
            ['name' => 'Granada',                   'code' => 18],
            ['name' => 'Guadalajara',               'code' => 19],
            ['name' => 'Guipuzcoa',                 'code' => 20],
            ['name' => 'Huelva',                    'code' => 21],
            ['name' => 'Huesca',                    'code' => 22],
            ['name' => 'Jaén',                      'code' => 23],
            ['name' => 'León',                      'code' => 24],
            ['name' => 'Lérida',                    'code' => 25],
            ['name' => 'Lugo',                      'code' => 27],
            ['name' => 'Madrid',                    'code' => 28],
            ['name' => 'Málaga',                    'code' => 29],
            ['name' => 'Melilla',                   'code' => 52],
            ['name' => 'Murcia',                    'code' => 30],
            ['name' => 'Navarra',                   'code' => 31],
            ['name' => 'Orense',                    'code' => 32],
            ['name' => 'Palencia',                  'code' => 34],
            ['name' => 'Palmas (Las)',              'code' => 35],
            ['name' => 'Pontevedra',                'code' => 36],
            ['name' => 'Rioja (La)',                'code' => 26],
            ['name' => 'Salamanca',                 'code' => 37],
            ['name' => 'Santa Cruz de Tenerife',    'code' => 38],
            ['name' => 'Segovia',                   'code' => 40],
            ['name' => 'Sevilla',                   'code' => 41],
            ['name' => 'Soria',                     'code' => 42],
            ['name' => 'Tarragona',                 'code' => 43],
            ['name' => 'Teruel',                    'code' => 44],
            ['name' => 'Toledo',                    'code' => 45],
            ['name' => 'Valencia',                  'code' => 46],
            ['name' => 'Valladolid',                'code' => 47],
            ['name' => 'Vizcaya',                   'code' => 48],
            ['name' => 'Zamora',                    'code' => 49],
            ['name' => 'Zaragoza',                  'code' => 50],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemProvinceSeeder"
 */
