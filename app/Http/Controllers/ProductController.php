<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductDetailRequest;
use App\sanpham;
use App\danhmuc;
//use App\chitietsanpham;
use App\order;
use App\order_detail;
use App\anhsanpham;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Redirect;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('admin.home');
    }

//  Danh sách sản phẩm
    public function getList()
    {
        $data = sanpham::select('idsp', 'tensp', 'hinhanh', 'soluong', 'gia', 'madm')->orderBy('idsp', 'DESC')->get()->toArray();
        return view('admin.product.list', compact('data'));
    }

//  Thêm mới sản phẩm
    public function getAdd()
    {
        $cates = DB::select('select * from danhmuc');
        return view('admin.product.add', ["xxxx" => $cates]);
    }

    public function postAdd(ProductRequest $request)
    {
        $product = new sanpham;

        //lưu ảnh
        $image = $request->file('image');
        $filename = 'upload/' . $image->getFilename() . time() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($filename, File::get($image)); //luu vao trong o pubic

        $product->tensp = $request->productName;
        $product->hinhanh = $filename;
        $product->soluong = $request->number;
        $product->gia = $request->price;
        $product->noidung = $request->description;
        $product->thongsokythuat = $request->thongso;
        $product->motangan = $request->mota;
        $product->status = $request->status;
        $product->madm = $request->cat_id;
        $product->save();
        return redirect()->route('admin.product.list');
    }

//  Xóa sản phẩm
    public function getDelete($idsp)
    {
        $sp = sanpham::find($idsp);
        if ($sp->hinhanh) {
            Storage::disk('public')->delete($sp->hinhanh);
        }
        $sp->delete();
        return redirect()->route('admin.product.list');
    }

//  Sửa sản phẩm
    public function getEdit($idsp)
    {
        $cates = danhmuc::all();
        $product = sanpham::find($idsp);
        return view('admin.product.edit', compact('cates', 'product'));
    }

    public function postEdit(Request $request, $idsp)
    {
        $product = sanpham::find($idsp);

        $product->tensp = $request->productName;
        $product->soluong = $request->number;
        $product->gia = $request->price;
        $product->noidung = $request->description;
        $product->thongsokythuat = $request->thongso;
        $product->motangan = $request->mota;
        $product->madm = $request->cat_id;
        $product->save();
        return redirect()->route('admin.product.list');
    }

//  Thêm ảnh sản phẩm
    public function getAddAnh($idsp)
    {
        $product = sanpham::find($idsp);
        return view('admin.product.addanh', compact('product'));
    }

    public function postAddAnh(Request $request, $idsp)
    {
        //luu anh
        $image = $request->file('image');
        $filename = 'upload/' . $image->getFilename() . time() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($filename, File::get($image));

//        $product = sanpham::find($idsp);
        $product = new anhsanpham;
        $product->idsp = $request->idsp;
        $product->images = $filename;
        $product->save();
        return redirect()->route('admin.product.list');
    }

//  Danh sách hóa đơn
    public function listOrder()
    {
        $status = Input::get("status");
        if(isset($status) && $status != '-1'){
            $data = order::select('mahd', 'ten', 'email', 'dienthoai', 'diachi', 'donhang', 'status', 'created_at')->where('status',$status)->orderBy('updated_at', 'DESC')->get()->toArray();
        }else {
            $data = order::select('mahd', 'ten', 'email', 'dienthoai', 'diachi', 'donhang', 'status', 'created_at')->orderBy('updated_at', 'DESC')->get()->toArray();
        }
        return view('admin.order.order', compact('data','status'));
    }

//  Hóa đơn chi tiết
    public function listOrder_detail($mahd)
    {
        $data1 = order::find($mahd);
//        dd($data);
        $data = order_detail::where('mahd', $mahd)->select('id', 'mahd', 'tensp', 'soluong', 'gia', 'tongtien')->orderBy('updated_at', 'DESC')->get()->toArray();
        return view('admin.order.order_detail', compact('data1', 'data'));
    }

//  Xóa hóa đơn
    public function DeleteOrder($mahd)
    {
        $sp1 = order::find($mahd);
        $sp1->delete();
        return redirect()->route('admin.order.getDelete');

    }

//  cập nhập đơn hàng
    public function updateStatusOrder($mahd, Request $request)
    {
        $sp = order::find($mahd);
        $status = $request->status;
        $sp->status = $status;
        if ($status == "2") {
            $order_detail = order_detail::where('mahd', $mahd)->get();
            //Khi hủy đơn hàng phải tăng trả số lương sản phẩm
            foreach ($order_detail as $value){
                DB::table('sanpham')->where('idsp', $value->idsp)->increment('soluong', $value->soluong);
            }
        }
        $sp->save();
        return redirect()->route('admin.order.listOrder');

    }
}
