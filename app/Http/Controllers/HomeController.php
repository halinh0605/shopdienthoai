<?php

namespace App\Http\Controllers;
use DB;
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
    public function getIndex()
    {
        $product = DB::table('sanpham')->select('idsp','tensp','hinhanh','gia')->orderBy('idsp','DESC')->skip(0)->take(8)->get();
        return view('welcome',compact('product'));
    }
    public function dashboard() {
        return view('admin.home');
    }
}
