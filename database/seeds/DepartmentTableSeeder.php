<?php

use Illuminate\Database\Seeder;
use App\Department;
class DepartmentTableSeeder extends Seeder
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
