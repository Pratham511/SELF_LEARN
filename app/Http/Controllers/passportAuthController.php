<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class passportAuthController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        $validateData = $request->validateWithBag('user',[
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
        ]);
        
        $errors = new MessageBag();
        if (\App\Models\User::whereName($request->name)) {
            $errors->add('name', "The name is required");
        }
        if (\App\Models\User::whereEmail($request->email)->first()) {
            $errors->add('email', "This E-mail Address is used by other one.");
        }
        if (\App\Models\User::wherePassword($request->password)) {
            $errors->add('email', "The password is minimum 8 characters");
        }
        // if ($errors->any()) {
            //     return back()->withInput()->withErrors($errors);
            // }
            
            $user= User::create([
                'name' =>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);
        
        return response()->json(['success'=> True,'data'=>$user]);

    }
}
