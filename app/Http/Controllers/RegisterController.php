<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;


class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:2',
            're_password' => 'required|min:2',
            'address' => 'required',
            'phone_number' => 'required',
        ]);
        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->address = $request->address;
            $user->phone_number = $request->phone_number;
            if($user->save())
            {
                $cred = $request->only('email','password');
                if(Auth::attempt($cred))
                {
                    return redirect('/');
                }else{
                    return "Not Auth";
                }
            return abort(500);
        }
    }
}
