<?php

use Illuminate\Database\Seeder;
use App\UserProfile;
class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserProfile::insert([
        		['user_id'=>2,
        		'first_name'=>'rutul',
        		'last_name'=>'thakkar',
        		'mobile'=>'123465790',
        		'phone'=>'12345868',
        		'city'=>'ahmedabad',
        		'state'=>'gujarat',
        		'country'=>'india',
        		'zipcode'=>'123456',
        		'dob'=>'1996-12-02',
        		'gender'=>'male',
        		],
        		['user_id'=>3,
        		'first_name'=>'pallav',
        		'last_name'=>'mehta',
        		'mobile'=>'123465790',
        		'phone'=>'12345868',
        		'city'=>'ahmedabad',
        		'state'=>'gujarat',
        		'country'=>'india',
        		'zipcode'=>'123456',
        		'dob'=>'1996-12-02',
        		'gender'=>'male',
        		],
        	]);
    }
}
