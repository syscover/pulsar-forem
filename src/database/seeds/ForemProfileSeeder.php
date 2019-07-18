<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Profile;

class ForemProfileSeeder extends Seeder
{
    public function run()
    {
        Profile::insert([
            ['id' => 1,     'name' => 'Formador',               'publish' => true],
            ['id' => 2,     'name' => 'Proyectos',              'publish' => true],
            ['id' => 3,     'name' => 'Formación',              'publish' => true],
            ['id' => 4,     'name' => 'Contabilidad',           'publish' => true],
            ['id' => 5,     'name' => 'Nóminas',                'publish' => true],
            ['id' => 6,     'name' => 'Informática',            'publish' => true],
            ['id' => 7,     'name' => 'Orientación laboral',    'publish' => true],
            ['id' => 8,     'name' => 'Administración',         'publish' => true],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemProfileSeeder"
 */