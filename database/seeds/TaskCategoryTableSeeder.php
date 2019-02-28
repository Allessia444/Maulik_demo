<?php

use Illuminate\Database\Seeder;
use App\TaskCategory;
class TaskCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskCategory::insert([
        	'name'=>'taskcategory1'
        	]);
    }
}
