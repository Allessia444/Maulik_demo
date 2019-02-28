<?php

use Illuminate\Database\Seeder;
use App\TeamLead;
class TeamLeadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeamLead::insert([
        		'member_id'=>1,
        		'teamlead_id'=>1,
        		'department_id'=>1,

        	]);
    }
}
