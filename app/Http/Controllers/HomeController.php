<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $user = User::where('id', Auth::user()->id)->first();
            // toastr()->success('Selamat datang '.Auth::user()->nama);
            return view('admin.index', compact('user'));
        }else if(Auth::user()->role == 'wakasek'){
            $user = User::where('id', Auth::user()->id)->first();
            // toastr()->success('Selamat datang '.Auth::user()->nama);
            return view('home', compact('user'));
        }
        
    }
}
