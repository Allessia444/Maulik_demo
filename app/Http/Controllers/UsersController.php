<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserProfile;
use Validator;
use Auth;
use Former;
class UsersController extends Controller
{
    //
    public function index(){
        return view('portal.users.index');
    }

    public function edit(){
    	$user_id=Auth::user()->id;
        $user=User::find($user_id);
        $user_profile=User::find($user_id)->user_profile;
        Former::populate($user);
        return view('portal.users.profile',compact('user','user_profile'));
    }
    public function update(Request $request, $id)
    {
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
            $user->save();
            $userprofile=New UserProfile;
            $userprofile = $user->user_profile;
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

        return redirect()->route('home')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
        return redirect()->route('home')->withError('Something went wrong, Please try after sometime.');
        }
    }
}
