@extends('admin.layouts.master')
@section('action','Edit')
@section('content')

    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h2>Thêm mới ảnh banner</h2>
                <div class="card-body card-block">

                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

                        <div class="row form-group">
                            <div >
                                <input type="file" id="image" name="image" multiple="multiple"  />
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