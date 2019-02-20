<?php

use Illuminate\Database\Seeder;
use App\Designation;
class designation_table_seeder extends Seeder
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
