<?php

use Illuminate\Database\Seeder;
use App\Task;
class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::insert([
        		'task_category_id'=>1,
        		'user_id'=>1,
        		'name'=>'task1',
        		'start_date'=>'2019-02-25',
        		'end_date'=>'2019-02-25',
        		'priority'=>'low',

        	]);
    }
}
