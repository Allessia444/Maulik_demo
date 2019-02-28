<?php

use Illuminate\Database\Seeder;
use App\Designation;
class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Designation::insert([
        	['name'=>'senior'],
            ['name'=>'junior'],
        	]);
    }
}
