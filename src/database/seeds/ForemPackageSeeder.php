<?php

use Illuminate\Database\Seeder;
use Syscover\Admin\Models\Package;

class ForemPackageSeeder extends Seeder
{
    public function run()
    {
        Package::insert([
            ['id' => 500, 'name' => 'Forem Package', 'root' => 'forem', 'sort' => 500, 'active' => true]
        ]);
    }
}

/*
 * Command to run:
 * php artisan db:seed --class="ForemPackageSeeder"
 */