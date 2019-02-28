<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Client;
use App\Project;
use App\Blog;
use DB;
use Auth;
class DashboardController extends Controller
{	
	//Show the dashboard 
	public function index(){
		if(Auth::user()->role == "admin"){
			$user=User::where('role','=','user')->count();
			$clients=Client::count();
			$projects=Project::count();

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
		else{
			$user=Blog::where('user_id','=',Auth::user()->id)->count();
			return view('admin.user_dashboard',compact('user'));
		}
	}

	//Show the color 
	public function color(){
		return view('admin.colors.jquerycolor');
	}

}
