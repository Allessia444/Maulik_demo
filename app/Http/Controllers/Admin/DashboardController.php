<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Clients;
use App\Projects;
use DB;
class DashboardController extends Controller
{	
	//Show the dashboard 
    public function index(){
        $user=User::count();
        $clients=Clients::count();
        $projects=Projects::count();

		    $users = User::count();
		    $users = User::select(DB::raw("COUNT(*) as count , extract(month from created_at) as month"))
		    ->groupBy(DB::raw("extract(month from created_at)"))
		    ->pluck('count','month');

		    for($i=1; $i<=12;$i++)
		    {
		    $users_data[] = isset($users[$i]) ? $users[$i] : 0;
		    }
		    $data[] = array(

		    'data' => $users_data
		    );
		    $data = json_encode($data);

        $january=User::where([['created_at','>=','2019-01-01 00:00:00'],['created_at','<=','2019-02-01 00:00:00']])->count();
        $february=User::where([['created_at','>=','2019-02-01 00:00:00'],['created_at','<=','2019-03-01 00:00:00']])->count();
    	return view('admin.dashboard',compact('user','clients','projects','blogs','january','february','data'));
    }

}
