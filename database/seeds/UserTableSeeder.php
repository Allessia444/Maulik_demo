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
        	'contact'=>'12345868',
        	'role'=>'admin'],
            ['first_name'=>'rutul',
            'last_name'=>'thakkar',
            'email'=>'rutul@gmail.com',
            'password'=>bcrypt('1234'),
            'contact'=>'12345868',
            'role'=>'user']
        	]);
    }
}
