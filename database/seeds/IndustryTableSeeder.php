<?php

use Illuminate\Database\Seeder;
use App\Industry;
class IndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industry::insert([
        	['name'=>'automobiles'],
            ['name'=>'power'],
        	]);
    }
}