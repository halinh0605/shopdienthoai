<?php

namespace App\Http\Controllers;
use App\Http\Requests\CateRequest;
use App\danhmuc;
class CateController extends Controller

{
//Danh sách danh mục sản phẩm
    public function getList() {
        $cat = danhmuc::select('madm','tendm')->orderBy('madm','DESC')->get()->toArray();
        return view('admin.cate.list',compact('cat'));
    }

//Thêm mới danh mục sản phẩm
    public function getAdd() {
        return view('admin.cate.add');
    }

    public function postAdd(CateRequest $request){
       $cate = new danhmuc;
       $cate->tendm = $request->cat_name;
       $cate->save();
       return redirect()->route('admin.cate.list');
    }

//Xóa danh mục
    public function getDelete($madm) {
        $dm = danhmuc::find($madm);
        $dm->delete();
        return redirect()->route('admin.cate.list');
    }
}
