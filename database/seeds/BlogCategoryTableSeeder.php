<?php

use Illuminate\Database\Seeder;
use App\BlogCategory;
class BlogCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BlogCategory::insert([
        	['name'=>'blogcategory1'],
        	['name'=>'blogcategory2'],
        	]);
    }
}
