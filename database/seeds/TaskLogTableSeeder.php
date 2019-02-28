<?php

use Illuminate\Database\Seeder;
use App\TaskLog;
class TaskLogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskLog::insert([
        		'task_id'=>1,
        		'user'=>1,
        		'date'=>'2019-02-25',
        		'billable'=>1,
        	]);
    }
}
