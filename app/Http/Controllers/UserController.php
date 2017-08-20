<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Order;
use App\Category;
use App\Item;

class UserController extends Controller
{


    public function getLogin()
    {
        return view('auth.login');
    }


    public function attemptLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email|exists:users',
            'password'=>'required'
        ]);
        if($validator->fails())
            return back()->withErrors($validator->errors())->withInput();

        $cred = $request->only('email','password');
        if(Auth::attempt($cred,(bool)$request->remember_me))
        {
            return redirect('/');
        }
        return back()->withErrors(['Wrong Password Or Email'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function getAllUsers()
    {
        $users = User::all()->where('status','=','1');
        return view('adminPages.user.user', compact('users'));
    }

    public function getUserOrders($user_id)
    {
        $orders = Order::all()->where('user_id','=',$user_id);
        if(Auth::user()->status == 0) {
            return view('adminPages.user.userOrders', compact('orders'));
        }else{
            return view('userPages.userOrders', compact('orders'));
        }
    }

    //delete user by admin
    public function userDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/dashboard/user');
    }

    //delete an order by admin
    public function userOrderDelete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect('/dashboard/user');
    }

}
