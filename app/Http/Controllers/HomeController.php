<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserProfile;
use Auth;
use Former;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function user_home(){
        
    }

    public function insertUserForm(){
        return view('admin.users.create');
    }

    public function insertUser(Request $request){
       $user= User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact'=>$request->contact,
            'role'=>$request->role,
        ]);
        UserProfile::create([
            'user_id'=>$user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile'=>$request->contact,
        ]);
        return redirect()->route('home');
    }
    
}
