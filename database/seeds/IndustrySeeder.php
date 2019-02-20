<?php

use Illuminate\Database\Seeder;
use App\Industrys;
class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industrys::insert([
        	['name'=>'automobiles'],
            ['name'=>'power'],
        	]);
    }
}
