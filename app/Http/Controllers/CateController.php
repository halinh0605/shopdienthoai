<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\danhmuc;
class CateController extends Controller
{
    public function getList() {
        $cat = danhmuc::select('madm','tendm','tukhoa','mota')->orderBy('madm','DESC')->get()->toArray();
        return view('admin.cate.list',compact('cat'));
    }
    public function getAdd() {
        return view('admin.cate.add');
    }
    public function postAdd(CateRequest $request){
       $cate = new danhmuc;
       $cate->tendm = $request->cat_name;
       $cate->tukhoa = $request->meta_keyword;
       $cate->mota = $request->meta_description;
       $cate->save();
       return redirect()->route('admin.cate.list');

    }
}
