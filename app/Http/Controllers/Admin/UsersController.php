<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserProfile;
use App\Department;
use App\Designation;
use App\Blog;
use Validator;
use Former;
use Auth;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    //List all users
    public function index()
    {
        $users = User::where('role','=','user')->get();
        return view('admin.users.index',compact('users'));
    }
    //Create the new user
    public function create()
    {
        $departments = Department::get()->pluck('name','id');
        $designations = Designation::get()->pluck('name','id');
        return view('admin.users.create',compact('departments','designations'));
    }
    //Store the detail of user
    public function store(Request $request)
    {
        //Rules for validation
        $rules=[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required',
        ];
        // Messages for validation
        $messages=[
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'email.required' => 'Please enter email.',
            'phone.required' => 'Please enter phone 1.',
            'phone.numeric' => 'Please enter number.',
            'password.required' => 'Please enter password.',
        ];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {   


            $user = New User;
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->password);
            $user->department_id=$request->get('department_id');
            $user->designation_id=$request->get('designation_id');
            $user->team_lead=$request->get('team_lead');
            $user->phone=$request->get('phone');
            $user->role=$request->get('role');
            $user->save();
            
            $userprofile=New UserProfile;
            $userprofile->user_id=$user->id;
            $userprofile->first_name = $request->get('first_name');
            $userprofile->last_name = $request->get('last_name');
            $userprofile->mobile = $request->get('mobile');
            $userprofile->phone = $request->get('phone');
            $userprofile->address1 = $request->get('address1');
            $userprofile->address2 =$request->get('address2');
            $userprofile->city = $request->get('city');
            $userprofile->state = $request->get('state');
            $userprofile->zipcode = $request->get('zipcode');
            $userprofile->dob = $request->get('dob');
            $userprofile->gender = $request->get('gender');
            $userprofile->marrital_status = $request->get('marrital_status');
            $userprofile->pan_number = $request->get('pan_number');
            $userprofile->management_level = $request->get('management_level');
            $userprofile->join_date = $request->get('join_date');
            $userprofile->attach = $request->get('attach');
            $userprofile->google = $request->get('google');
            $userprofile->facebook = $request->get('facebook');
            $userprofile->website = $request->get('website');
            $userprofile->skype = $request->get('skype');
            $userprofile->linkedin = $request->get('linkedin');
            $userprofile->twitter = $request->get('twitter');
            $userprofile->save();

        return redirect()->route('users.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
        return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
        }
       
    }
    // Show the full details of user
    public function show($id)
    {
        $user=User::find($id);
        $user_profile=User::find($id)->user_profile;
        $blogs=Blog::where('user_id','=',$id)->get();
        Former::populate($user);

        return view('admin.users.show',compact('user','user_profile','blogs'));
    }
    //Edit the user 
    public function edit($id)
    {
        $user=User::find($id);
        $user_profile=User::find($id)->user_profile;
        Former::populate($user);
        $departments = Department::get()->pluck('name','id');
        $designations = Designation::get()->pluck('name','id');
        return view('admin.users.edit',compact('user','user_profile','departments','designations'));
    }
    //Update the user details
    public function update(Request $request, $id)
    {
        //Rules for validation
        $rules=[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ];
        // Messages for validation
        $messages=[
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'email.required' => 'Please enter email.',
            'phone.required' => 'Please enter phone 1.',
            'phone.numeric' => 'Please enter number.',
        ];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {   

            $user = User::find($id);
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->phone=$request->get('phone');
            $user->department_id=$request->get('department_id');
            $user->designation_id=$request->get('designation_id');
            $user->team_lead=$request->get('team_lead');
            $user->save();

            $userprofile=$user->user_profile;
            $userprofile->first_name = $request->get('first_name');
            $userprofile->last_name = $request->get('last_name');
            if($request->get('photo'))
            {
                $userprofile->photo = $request->get('photo');    
            }
            $userprofile->mobile = $request->get('mobile');
            $userprofile->phone = $request->get('phone');
            $userprofile->address1 = $request->get('address1');
            $userprofile->address2 =$request->get('address2');
            $userprofile->city = $request->get('city');
            $userprofile->country = $request->get('country');
            $userprofile->state = $request->get('state');
            $userprofile->zipcode = $request->get('zipcode');
            $userprofile->dob = $request->get('dob');
            $userprofile->gender = $request->get('gender');
            $userprofile->marrital_status = $request->get('marrital_status');
            $userprofile->pan_number = $request->get('pan_number');
            $userprofile->management_level = $request->get('management_level');
            $userprofile->join_date = $request->get('join_date');
            if($request->get('attach'))
            {
                $userprofile->attach = $request->get('attach');
            }
            $userprofile->google = $request->get('google');
            $userprofile->facebook = $request->get('facebook');
            $userprofile->website = $request->get('website');
            $userprofile->skype = $request->get('skype');
            $userprofile->linkedin = $request->get('linkedin');
            $userprofile->twitter = $request->get('twitter');
            $userprofile->save();

        return redirect()->route('users.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
        return redirect()->route('users.index')->withError('Something went wrong, Please try after sometime.');
        }

    }
    //Delete the user
    public function destroy($id)
    {
         $user = User::find($id);
      $user->delete();
      return redirect()->route('users.index');
    }
    //Edit profile of user for user side
    public function edit_profile(){
        $user_id=Auth::user()->id;
        $user=User::find($user_id);
        $user_profile=User::find($user_id)->user_profile;
        Former::populate($user);
        return view('portal.users.profile1',compact('user','user_profile'));
    }
    //Update the profile of user for user side
    public function update_profile(Request $request, $id){
        //Rules for validation
        $rules=[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ];
        // Messages for validation
        $messages=[
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'email.required' => 'Please enter email.',
            'phone.required' => 'Please enter phone 1.',
            'phone.numeric' => 'Please enter number.',
        ];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {   

            $user = User::find($id);
            $user->first_name = $request->get('first_name');
            $user->last_name = $request->get('last_name');
            $user->email = $request->get('email');
            $user->phone=$request->get('phone');
            // $user->department_id=$request->get('department_id');
            // $user->designation_id=$request->get('designation_id');
            // $user->team_lead=$request->get('team_lead');
            $user->save();

            $userprofile=$user->user_profile;
            $userprofile->first_name = $request->get('first_name');
            $userprofile->last_name = $request->get('last_name');
            if($request->get('photo'))
            {
                $userprofile->photo = $request->get('photo');    
            }
            $userprofile->mobile = $request->get('mobile');
            $userprofile->phone = $request->get('phone');
            $userprofile->address1 = $request->get('address1');
            $userprofile->address2 =$request->get('address2');
            $userprofile->city = $request->get('city');
            $userprofile->country = $request->get('country');
            $userprofile->state = $request->get('state');
            $userprofile->zipcode = $request->get('zipcode');
            $userprofile->dob = $request->get('dob');
            $userprofile->gender = $request->get('gender');
            $userprofile->marrital_status = $request->get('marrital_status');
            $userprofile->pan_number = $request->get('pan_number');
            $userprofile->management_level = $request->get('management_level');
            $userprofile->join_date = $request->get('join_date');
            if($request->get('attach'))
            {
                $userprofile->attach = $request->get('attach');
            }
            $userprofile->google = $request->get('google');
            $userprofile->facebook = $request->get('facebook');
            $userprofile->website = $request->get('website');
            $userprofile->skype = $request->get('skype');
            $userprofile->linkedin = $request->get('linkedin');
            $userprofile->twitter = $request->get('twitter');
            $userprofile->save();

        return redirect()->route('editprofile')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
        return redirect()->route('editprofile')->withError('Something went wrong, Please try after sometime.');
        }

    }
    //Upload profile photo of user from user side
    public function upload_profile(Request $request){
        try{
            $profile= $request->profile;
            $user = User::find(Auth::user()->id);
            $userprofile=$user->user_profile;
            $userprofile->photo=$profile;
            $userprofile->save();    
            return response()->json([
                    'profile' => $profile,
                    'status' => 200
                ]);
        }
        catch(\Exception $e){
            return response()->json(['status'=>422]);
        }
    }

    //Import users data
    public function import(Request $request) 
    {
        $file=public_path().'/tmp/'.$request->get('file');
         Excel::import(new UsersImport, $file);
         return 'hii';
    }
    //Export the users
    public function export() 
    {
         return Excel::download(new UsersExport, 'users.xlsx');
    }
}
