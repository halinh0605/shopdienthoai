<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductDetailRequest;
use App\sanpham;
use App\danhmuc;
use App\chitietsanpham;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function getList()
    {
        $data = sanpham::select('idsp', 'tensp', 'hinhanh', 'soluong', 'gia', 'motangan', 'noidung', 'madm')->orderBy('idsp', 'DESC')->get()->toArray();
        return view('admin.product.list', compact('data'));
    }

    public function getAdd()
    {
        $cates = DB::select('select * from danhmuc');
        return view('admin.product.add', ["xxxx" => $cates]);
    }

    public function postAdd(ProductRequest $request)
    {
        $product = new sanpham;

        //luu anh
        $image = $request->file('image');
        $filename = 'upload/' . $image->getFilename() . time() . '.' . $image->getClientOriginalExtension();
        Storage::disk('public')->put($filename, File::get($image));


        $product->tensp = $request->productName;
        $product->hinhanh = $filename;
        $product->soluong = $request->number;
        $product->gia = $request->price;
        $product->noidung = $request->description;
        $product->motangan = $request->mota;
        $product->madm = $request->cat_id;
        $product->save();
        return redirect()->route('admin.product.list');

    }


    public function getDelete($idsp)
    {
        $sp = sanpham::find($idsp);
        if ($sp->hinhanh) {
            Storage::disk('public')->delete($sp->hinhanh);
        }
        $sp->delete();
        return redirect()->route('admin.product.list');
    }

    public function getEdit($idsp)
    {
        $cates = danhmuc::all();
        $product = sanpham::find($idsp);
        return view('admin.product.edit', compact('cates', 'product'));
    }

    public function postEdit(Request $request,$idsp)
    {
        $product =sanpham::find($idsp);

        $product->tensp = $request->productName;
        $product->soluong = $request->number;
        $product->gia = $request->price;
        $product->noidung = $request->description;
        $product->madm = $request->cat_id;
        $product->save();
        return redirect()->route('admin.product.list');
    }
}
