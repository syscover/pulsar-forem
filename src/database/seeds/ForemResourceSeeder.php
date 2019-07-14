<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Resource;

class ForemResourceSeeder extends Seeder
{
    public function run()
    {
        Resource::insert([
            ['id' => 'forem',                       'name' => 'Forem Package',      'package_id' => 500],
            ['id' => 'forem-category',              'name' => 'Categories',         'package_id' => 500],
            ['id' => 'forem-employment-office',     'name' => 'Employment offices', 'package_id' => 500],
            ['id' => 'forem-expedient',             'name' => 'Expedients',         'package_id' => 500],
            ['id' => 'forem-action',                'name' => 'Actions',            'package_id' => 500],
            ['id' => 'forem-group',                 'name' => 'Groups',             'package_id' => 500],
            ['id' => 'forem-group-office',          'name' => 'Groups',             'package_id' => 500],
            ['id' => 'forem-student',               'name' => 'Students',           'package_id' => 500],
            ['id' => 'forem-inscription',           'name' => 'Inscriptions',       'package_id' => 500],
            ['id' => 'forem-inscription-office',    'name' => 'Inscriptions',       'package_id' => 500],
            ['id' => 'forem-database',              'name' => 'Database',           'package_id' => 500],
            ['id' => 'forem-province',              'name' => 'Provinces',          'package_id' => 500],
            ['id' => 'forem-locality',              'name' => 'Localities',         'package_id' => 500],
            ['id' => 'forem-trainer',               'name' => 'Trainers',           'package_id' => 500],
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemResourceSeeder"
 */
