<?php

namespace App\Http\Controllers;

use DB;
//use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\sanpham;
use App\khachhang;
use App\hoadon;
use App\chitiethoadon;
use App\anhsanpham;
use Illuminate\Support\Facades\Input;
use Cart;


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

    public function index()
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
        $image = DB::table('anhsanpham')->select('id', 'images', 'idsp')->where('idsp', $sanpham->idsp)->get();
        return view('pages.chitietsanpham', compact('sanpham', 'image'));
    }


    public function giohang($idsp)
    {
        $product_buy = sanpham::find($idsp);
        Cart::instance('shopping')->add(['id' => $product_buy->idsp, 'name' => $product_buy->tensp, 'qty' => 1, 'price' => $product_buy->gia, 'weight' => 550, 'options' => ['image' => $product_buy->hinhanh]]);
        $content = Cart::content();
//        $total = Cart::instance('shopping')->subtotal();
        $total = Cart::subtotal(0, ',', '.');
        return view('pages.giohang', compact('content', 'total'));
    }
    public function tranggiohang(){
        $content = Cart::instance('shopping')->content();
        $total = Cart::subtotal(0, ',', '.');
        return view('pages.giohang', compact('content', 'total'));
    }


    public function xoasanpham($rowId)
    {
        Cart::instance('shopping')->remove($rowId);
        $content = Cart::instance('shopping')->content();
        $total = Cart::instance('shopping')->total();

//        return $content;
        return view('pages.giohang', compact('content', 'total'));
    }

    public function datHang()
    {
        $content = Cart::instance('shopping')->content();
        $total = Cart::subtotal(0, ',', '.');
        return view('pages.dathang', compact('content', 'total'));
    }

    public function capnhap(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        Cart::instance('shopping')->update($id, $qty);
        return  Cart::subtotal(0, ',', '.');
    }

    public function capnhapicon(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;

        $product_buy = sanpham::find($id);
        Cart::instance('shopping')->add(['id' => $product_buy->idsp, 'name' => $product_buy->tensp, 'qty' => 1, 'price' => $product_buy->gia, 'weight' => 550, 'options' => ['image' => $product_buy->hinhanh]]);
        return Cart::count();
    }

    public function postDonhang(Request $request)
    {
        $hoadon = new hoadon;
        $khachhang = new khachhang;
        $chitiethd = new chitiethoadon;


        $content = Cart::instance('shopping')->content();
        $total = (int)Cart::instance('shopping')->subtotal(0,'','');
        foreach ( $content as $item){
            $chitiethd->tensp = $item->name;
            $chitiethd->soluong =  $item->qty;
            $chitiethd->gia = $item->price;
        }

//        $bcv->soluong = $request->soluong;
//        $bcv->sanpham = $request->sp;
//        $bcv->tongtien = $request->tongtien;
        $khachhang->ten = $request->name;
        $khachhang->diachi = $request->add1;
        $khachhang->dienthoai = $request->number;
        $khachhang->email = $request->email;

        $hoadon->tongtien = $total;
        $khachhang->save();
        $hoadon->idkh=$khachhang->idkh;
        $hoadon->save();
        $chitiethd->mahd =$hoadon->mahd;
        $chitiethd->save();
        Cart::instance('shopping')->destroy();
        return redirect()->route('sanpham');

    }


}
