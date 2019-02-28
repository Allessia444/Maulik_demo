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
            DesignationTableSeeder::class,
            DepartmentTableSeeder::class,
            UserTableSeeder::class,
            // UserprofileTableSeeder::class,
            BlogCategoryTableSeeder::class,
            BlogTableSeeder::class,
            IndustryTableSeeder::class,
            ClientTableSeeder::class,
            ProjectTableSeeder::class,
            ProjectCategoryTableSeeder::class,
            TaskCategoryTableSeeder::class,
            TaskTableSeeder::class,
            TeamLeadTableSeeder::class,
            TaskLogTableSeeder::class,
            SiteSettingsTableSeeder::class,
	    ]);
    }
}
