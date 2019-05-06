<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\sanpham;
use Illuminate\Support\Facades\Input;

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

    public function dashboard()
    {
        return view('admin.home');
    }

    public function getIndex()
    {
        $product = DB::table('sanpham')->select('idsp', 'tensp', 'hinhanh', 'gia')->orderBy('idsp', 'DESC')->skip(0)->take(8)->get();
        return view('pages.home', compact('product'));
    }

    public function sanPham()
    {
        return $this->getSanPham(null);

    }

    public function getSanPham($madm)
    {
        if ($madm) {
            $sp_theoloai = sanpham::where('madm', $madm)->select('idsp', 'tensp', 'hinhanh', 'gia')->skip(0)->take(9)->get();
        } else {
            $sp_theoloai = sanpham::select('idsp', 'tensp', 'hinhanh', 'gia')->orderBy('idsp', 'DESC')->skip(0)->take(9)->get();

        }
        return view('pages.sanpham', compact('sp_theoloai'));
    }


    public function getChitiet(Request $req)
    {
        $sanpham = sanpham::where('idsp', $req->idsp)->first();
        return view('pages.chitietsanpham', compact('sanpham'));
    }
}
