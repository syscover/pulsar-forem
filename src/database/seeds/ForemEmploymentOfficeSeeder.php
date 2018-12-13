<?php

use Illuminate\Database\Seeder;
use Syscover\Forem\Models\EmploymentOffice;

class ForemEmploymentOfficeSeeder extends Seeder
{
    public function run()
    {
        EmploymentOffice::insert([
            ['id' => 1, 'code' => 'OA02008910', 'name' => 'Alcaraz', 'slug' => 'alcaraz', 'country_id' => 'ES'],
            ['id' => 2, 'code' => 'OA02009910', 'name' => 'Almansa', 'slug' => 'almansa', 'country_id' => 'ES']
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemEmploymentOfficeSeeder"
 */