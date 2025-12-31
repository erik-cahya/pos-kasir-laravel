<?php

namespace App\Http\Controllers;

// use Auth;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['countBarang'] = BarangModel::count();
        $data['countStock'] = BarangModel::sum('stok');
        $data['countKategori'] = KategoriModel::count();

        // dd($data['countStock']);
        if (Auth::user()->role == 'admin') {
            $data['user'] = User::where('id', Auth::user()->id)->first();
            // toastr()->success('Selamat datang '.Auth::user()->nama);
            return view('admin.index', $data);
        } else if (Auth::user()->role == 'wakasek') {
            $data['user'] = User::where('id', Auth::user()->id)->first();
            // toastr()->success('Selamat datang '.Auth::user()->nama);
            return view('home', $data);
        }
    }
}
