<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Clients;
use App\Industrys;
use Validator;
use Former;
class ClientsController extends Controller
{
    //List all clients 
    public function index()
    {
        $clients=Clients::all();
        
        return view('admin.clients.index',compact('clients'));
    }
    //Add the new client
    public function create()
    {
        $industrys=Industrys::all()->pluck('name','id');
        return view('admin.clients.create',compact('industrys'));   
    }
    //Store the new client data
    public function store(Request $request)
    {
        //Rules for validation 
        $rules=[
        'name' => 'required',
        'email' => 'required|email|unique:clients,email',
        'phone' => 'required|numeric',
        ];
        // Messages for validation
        $messages=[
        'name.required' => 'Please enter  name.',
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


            $client = New Clients;
            $client->industry_id = $request->get('industry_id');
            $client->name = $request->get('name');
            $client->email = $request->get('email');
            $client->phone=$request->get('phone');
            $client->logo=$request->get('logo');
            $client->website = $request->get('website');
            $client->fax = $request->get('fax');
            
            $client->address1 = $request->get('address1');
            $client->address2 =$request->get('address2');
            $client->city = $request->get('city');
            $client->state = $request->get('state');
            $client->country = $request->get('country');
            $client->zipcode = $request->get('zipcode');
            

            $client->save();

            return redirect()->route('clients.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Client full details show
    public function show($id)
    {
        $client=Clients::find($id);
        Former::populate($client);
        $industrys=Industrys::all()->pluck('name','id');
        return view('admin.clients.show',compact('client','industrys'));
    }
    //Edit the client details
    public function edit($id)
    {
        $client=Clients::find($id);
        $industrys=Industrys::all()->pluck('name','id');
        Former::populate($client);
        return view('admin.clients.edit',compact('client','industrys'));
    }
    //Update the client details
    public function update(Request $request, $id)
    {
        //Rules for validation
        $rules=[
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|numeric',
        ];
        // Messages for validation
        $messages=[
        'name.required' => 'Please enter  name.',
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


            $client = Clients::find($id);
            $client->industry_id = $request->get('industry_id');
            $client->name = $request->get('name');
            $client->email = $request->get('email');
            $client->phone=$request->get('phone');
            if($request->get('logo')){
                $client->logo=$request->get('logo');    
            }
            
            $client->website = $request->get('website');
            $client->fax = $request->get('fax');
            
            $client->address1 = $request->get('address1');
            $client->address2 =$request->get('address2');
            $client->city = $request->get('city');
            $client->state = $request->get('state');
            $client->country = $request->get('country');
            $client->zipcode = $request->get('zipcode');
            

            $client->save();

            return redirect()->route('clients.index')->withSuccess("Insert record successfully.");
        }
        catch(\Exception $e)
        {
            return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
        }
    }
    //Delete the client
    public function destroy($id)
    {
        $client = Clients::find($id);
        $client->delete();
        return redirect()->route('clients.index');
    }
}
