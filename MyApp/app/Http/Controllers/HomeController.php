<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function checkUserType()
    {
        if (!Auth::user()) {
            return redirect()->route('Authentification');
        }
        if (Auth::user()->userType === 'admin') {

            return redirect()->route('trajets.index');
        }
        if (Auth::user()->userType === 'passager') {

            return redirect()->route('trajets.index');
        }
        if (Auth::user()->userType === 'conducteur') {

            return redirect()->route('trajets.index');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    ///
    //    return view('home');
    //}
}