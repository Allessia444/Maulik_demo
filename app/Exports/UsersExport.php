<?php

namespace App\Exports;

use App\User;
use App\UserProfile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() :View
    {
    	$users=User::where('role','=','user')->get();
    	
    	return view('exports.users',compact('users'));
    }
}
