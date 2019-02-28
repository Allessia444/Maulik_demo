<?php

use Illuminate\Database\Seeder;
use App\ProjectCategory;
class ProjectCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectCategory::insert([
        	['name'=>'projectcategory1'],
        	]);
    }
}
