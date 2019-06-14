@extends('admin.layouts.master')
@section('action','Edit')
@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h2>Thêm mới ảnh chi tiết sản phẩm</h2>
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
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-catName" class=" form-control-label">Tên sản phẩm</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="productName" name="productName" value="{!! old('productName',isset($product) ? $product->tensp : '') !!}" class="form-control" />
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-catName" class=" form-control-label">Ảnh</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="image" name="image" multiple="multiple"  />
                                <img src=" {{ asset($product->hinhanh) }}"/>
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