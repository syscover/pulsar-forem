<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ForemTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(ForemPackageSeeder::class);
        $this->call(ForemResourceSeeder::class);
        $this->call(ForemEmploymentOfficeSeeder::class);

        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemTableSeeder"
 */