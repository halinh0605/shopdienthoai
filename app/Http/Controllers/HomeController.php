<?php

namespace App\Http\Controllers;

use DB;
//use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\sanpham;
use App\order;
use App\order_detail;
use App\anhsanpham;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Redirect;
use Cart;
use App\banner;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $status1 = 1; //Lọc sản phẩm bán chạy
        $status2 = 2; //Lọc sản phẩm mới
        $product1 = DB::table('sanpham')->select('idsp', 'tensp', 'hinhanh', 'gia')->where('status', $status1)->orderBy('idsp', 'DESC')->skip(0)->take(4)->get();
        $product2 = DB::table('sanpham')->select('idsp', 'tensp', 'hinhanh', 'gia')->where('status', $status2)->orderBy('idsp', 'DESC')->skip(0)->take(4)->get();
        $product = DB::table('sanpham')->select('idsp', 'tensp', 'hinhanh', 'gia')->orderBy('idsp', 'DESC')->skip(0)->take(8)->get();
        $image1 = DB::table('banner')->select('id', 'image')->orderBy('id', 'DESC')->get(); // Ảnh banner
        return view('pages.home', compact('product', 'product1', 'product2','image1'));
    }

    public function sanPham()
    {
        $q = Input::get("q");
        if (!isset($q)) {
            $q = ''; // Chức năng tìm kiếm
        } else {
            $q = $this->mssql_escape($q);// SQL Injection
        }
        // lọc sản phẩm nút tìm kiếm
        $sp_theoloai = sanpham::select('idsp', 'tensp', 'hinhanh', 'gia')->Where('tensp', 'LIKE', '%' . $q . '%')->orderBy('idsp', 'DESC')->paginate(9);
        return view('pages.sanpham', compact('sp_theoloai'));
    }

    public function lienhe()
    {
        return view('pages.lienhe');
    }

    public function laySanPhamTheoDanhMuc($madm)
    {
        $sp_theoloai = sanpham::where('madm', $madm)->select('idsp', 'tensp', 'hinhanh', 'gia')
            ->paginate(9);
        return view('pages.sanpham', compact('sp_theoloai'));
    }

    private function mssql_escape($unsafe_str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $unsafe_str); //SQL ịnjection
    }

    public function getChitiet(Request $req) //Hiển thị Trang chi tiết sản phẩm
    {
        $sanpham = sanpham::where('idsp', $req->idsp)->first();
        $image = DB::table('anhsanpham')->select('id', 'images', 'idsp')->where('idsp', $sanpham->idsp)->get();
        return view('pages.chitietsanpham', compact('sanpham', 'image'));
    }

    public function giohang($idsp) //Trang giỏ hàng
    {
        $product_buy = sanpham::find($idsp);
        Cart::instance('shopping')->add(['id' => $product_buy->idsp, 'name' => $product_buy->tensp, 'qty' => 1, 'price' => $product_buy->gia, 'weight' => 550, 'options' => ['image' => $product_buy->hinhanh]]);
        $content = Cart::content();
//        $total = Cart::instance('shopping')->subtotal();
        $total = Cart::subtotal(0, ',', '.');
        return view('pages.giohang', compact('content', 'total'));
    }

    public function tranggiohang() //Trang giỏ hàng khi click vào biểu tượng giỏ hàng
    {
        $content = Cart::instance('shopping')->content();
        $total = Cart::subtotal(0, ',', '.');
        return view('pages.giohang', compact('content', 'total'));
    }

    public function xoasanpham($rowId) // Xóa sản phẩm trong giỏ hàng
    {
        Cart::instance('shopping')->remove($rowId);
        $content = Cart::instance('shopping')->content();
        $total = Cart::instance('shopping')->total();
        return redirect()->route('giohang');
//        return view('pages.giohang', compact('content', 'total'));
    }

    public function datHang() // Trang đặt hàng
    {
        $content = Cart::instance('shopping')->content();
        $total = Cart::subtotal(0, ',', '.');
        return view('pages.dathang', compact('content', 'total'));
    }

//    public function muaHang($idsp)
//    {
//        $product_buy = sanpham::find($idsp);
//        Cart::instance('shopping')->add(['id' => $product_buy->idsp, 'name' => $product_buy->tensp, 'qty' => 1, 'price' => $product_buy->gia, 'weight' => 550, 'options' => ['image' => $product_buy->hinhanh]]);
//        $content = Cart::content();
//        return view('pages.dathang2', compact('content', 'idsp'));
//    }

    public function capnhap(Request $request) // Chức năng update số  lượng trong giỏ hàng
    {
        $id = $request->id;
        $qty = $request->qty;
        Cart::instance('shopping')->update($id, $qty);
        return response()->json(['tongtien' => Cart::subtotal(0, ',', '.'), 'tongso' => Cart::count()]);
    }

    public function capnhapicon(Request $request) //Khi thêm 1 sp vào giỏ hàng thì icon giỏ hàng được cộng lên
    {
        $id = $request->id;
        $qty = $request->qty;
        $product_buy = sanpham::find($id);
        Cart::instance('shopping')->add(['id' => $product_buy->idsp, 'name' => $product_buy->tensp, 'qty' => 1, 'price' => $product_buy->gia, 'weight' => 550, 'options' => ['image' => $product_buy->hinhanh]]);
        return Cart::count();
    }

    public function postDonhang(Request $request)
    {
        $hoadon = new order;
        $content = Cart::instance('shopping')->content();
        $total = (int)Cart::instance('shopping')->subtotal(0, '', '');
        $hoadon->ten = $request->name;
        $hoadon->diachi = $request->add1;
        $hoadon->dienthoai = $request->number;
        $hoadon->email = $request->email;
        $hoadon->donhang = $total;
        $hoadon->save();

        if (count($content) > 0) {
            foreach ($content as $key => $item) {
                $chitiethd = new order_detail;
                $chitiethd->tensp = $item->name;
                $chitiethd->soluong = $item->qty;
                $chitiethd->idsp = $item->id;
                $chitiethd->gia = $item->price;
                $chitiethd->tongtien = $item->price * $item->qty;
                $chitiethd->mahd = $hoadon->mahd;
                // khi đặt hàng phải giảm số lượng của item
                DB::table('sanpham')->where('idsp', $item->id)->decrement('soluong', (int)$item->qty);
                $chitiethd->save();
            }
        }
        Cart::instance('shopping')->destroy();
        return redirect()->route('sanpham');
    }

    // Banner trang home
    public function getAnhBanner(){
        return view('admin.banner');
    }
    public function postAnhBanner(Request $request){
        //luu anh
        $image = $request->file('image');
        $filename = 'upload/' . $image->getFilename() . time() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($filename, File::get($image));

        $anhBanner = new banner;

        $anhBanner->image = $filename;
        $anhBanner->save();
        return view('admin.banner');
    }
}
