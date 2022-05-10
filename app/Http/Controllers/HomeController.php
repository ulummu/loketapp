<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
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
        if (Auth::check()) {
            if (Auth::user()->hasRole('administrator')) {
                return view('home');
            } else if (Auth::user()->hasRole('staf_loket')) {
                return redirect('/loket/dashboard');
            }
        } else {
            // return view('auth.loginauth');
            return redirect('/login');
        }
    }
}
