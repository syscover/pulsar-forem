<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ForemTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(ForemPackageSeeder::class);

        Model::reguard();
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemTableSeeder"
 */