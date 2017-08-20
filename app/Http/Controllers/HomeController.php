<?php

namespace App\Http\Controllers;
use App\Category;
use App\Item;
use Auth;
use App\User;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getDashboard()
    {
        if(Auth::guest() || !Auth::user()->status == 0 ){
            return redirect('/');
        } else{
            return view('adminPages.dashboard');
        }
    }

    public function getAbout()
    {
        return view('about');
    }
}
