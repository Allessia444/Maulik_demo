<?php

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
        $this->call([
            UserTableSeeder::class,
            department_table_seeder::class,
            designation_table_seeder::class,
            IndustrySeeder::class,
	    ]);
    }
}
