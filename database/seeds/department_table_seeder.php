<?php

use Illuminate\Database\Seeder;
use App\Department;
class department_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Department::insert([
        	['name'=>'developer'],
            ['name'=>'tester'],
        	]);
    }
}
