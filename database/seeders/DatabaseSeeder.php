<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Location::factory(5)->create();
        \App\Models\PropertyType::factory(6)->create();
        \App\Models\Property::factory(10)->create();
    }
}
