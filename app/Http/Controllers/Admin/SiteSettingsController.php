<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SiteSetting;
use Validator;
use Former;
class SiteSettingsController extends Controller
{
    //Show the site setting
    public function index()
    {
        $site_setting=SiteSetting::first();
        Former::populate($site_setting);
        return view('admin.site_settings.index',compact('site_setting'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    //Update the site settings
    public function update(Request $request, $id)
    {
        //Rules for validation
         $rules=['title' => 'required',
                'email'=>'required|email',
                'copy_right'=>'required',
                ];
        //Message for validation
        $messages=['title.required' => 'Please enter title.',
                    'email.required' => 'Please enter email.',
                    'copy_right.required' => 'Please enter your copy right.'];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules,$messages);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        // try
        // {   
            $site_settings = SiteSetting::find($id);
            $site_settings->title = $request->get('title');
            $site_settings->email = $request->get('email');
            $site_settings->phone_1=$request->get('phone_1');
            $site_settings->phone_2=$request->get('phone_2');
            $site_settings->copy_right=$request->get('copy_right');
            $site_settings->site_visitors = $request->get('visitors');

           
            $site_settings->save();
            return redirect()->route('site_settings.index')->withSuccess("Insert record successfully.");
        // }
        // catch(\Exception $e)
        // {
        //     return redirect()->route('site_settings.index')->withError('Something went wrong, Please try after sometime.');
        // }
    }

    public function destroy($id)
    {
        //
    }
}
