@extends('admin.layouts.master')
@section('action','Add')
@section('content')

<div class="col-lg-10">
    <div class="card">
        <div class="card-header">
            <h1>Thêm mới sản phẩm</h1>
            <div class="card-body card-block">

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{!! route('admin.product.getAdd') !!}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Tên sản phẩm</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="productName" name="productName" placeholder="Nhập tên sản phẩm" class="form-control" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Số lượng</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="number" name="number" placeholder="Nhập số lượng" class="form-control" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Danh mục</label>
                        </div>
                        <div class="col-12 col-md-9">

                            <select name="cat_id">
                                @foreach ($xxxx as $item )
                                    <option value="{{ $item->madm }}"
                                    >{{ $item->tendm }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Nhóm</label>
                        </div>
                        <div class="col-3 col-md-3">
                           <select name="status" id="status">
                               <option value="0"></option>
                               <option value="1">Sản phẩm bán chạy</option>
                               <option value="2">Sản phẩm mới</option>
                           </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Ảnh</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="image" name="image"  />
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Giá</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="price" name="price" placeholder="Nhập giá" class="form-control" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Giá giảm</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="sale_off" name="sale_off" placeholder="Nhập giá" class="form-control" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Mô tả ngắn</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea class="noidung" name="mota" id="mota" cols="80" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Nội dung</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea class="noidung" name="description" id="description" cols="80" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Thông số kỹ thuật</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea  class="noidung" name="thongso" id="thongso" cols="80" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label"></label></div>
                        <div class="col col-md-9">
                            <div class="form-check">
                                <div class="checkbox">
                                    <label for="checkbox1" class="form-check-label ">
                                        <input type="checkbox" id="checkbox1" name="status" value="1" class="form-check-input">Ẩn/Hiện
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="addNew" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection