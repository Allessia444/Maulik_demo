<?php

use Illuminate\Database\Seeder;
use App\SiteSetting;
class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteSetting::insert([
        		'title'=>'maulik',
        		'email'=>'maulik@gmail.com',
        		'phone_1'=>'1234567890',
        		'phone_2'=>'1234567890',
        		'copy_right'=>'maulik',
        		'site_visitors'=>'100'
        	]);
    }
}
