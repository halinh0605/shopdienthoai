@extends('admin.layouts.master')
@section('action','Add')
@section('content')
    <div class="col-lg-7">
        <div class="card">
            <div class="card-header">
                <h1>Sửa danh mục</h1>
            </div>
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

                <form action="{!! route('admin.cate.getAdd') !!}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Tên danh mục</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="cat_name" name="cat_name" placeholder="Nhập tên danh mục" class="form-control" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Từ khóa</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="meta_keyword" name="meta_keyword" placeholder="Nhập từ khóa" class="form-control" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-catName" class=" form-control-label">Mô tả</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="meta_description" name="meta_description" placeholder="Nhập mô tả" class="form-control" />
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
                        <button type="submit" name="postAdd" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection