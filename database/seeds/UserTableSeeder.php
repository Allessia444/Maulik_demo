<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	['first_name'=>'maulik',
            'last_name'=>'khatri',
        	'email'=>'mk@gmail.com',
        	'password'=>bcrypt('1234'),
        	'phone'=>'12345868',
        	'role'=>'admin'],
            
        	]);
    }
}
