<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);

        \App\Models\Contact::factory(35)->create();
    }
}
