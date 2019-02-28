<?php

use Illuminate\Database\Seeder;
use App\Client;
class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::insert([
        	['industry_id'=>1,
        	'name'=>'client1',
        	'website'=>'client1',
        	'email'=>'client@gmail.com',
        	'phone'=>'1234556789',
        	'fax'=>'client1',
        	'city'=>'ahmedabad',
        	'state'=>'gujarat',
        	'country'=>'india',
        	'zipcode'=>'123456']
        	]);
    }
}
