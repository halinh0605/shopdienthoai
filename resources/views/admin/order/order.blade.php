@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <section class="content-header">
        <h1>
            Danh sách đơn hàng
        </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            {{--@if (Session::has('message'))--}}
                {{--<div class="alert alert-info"> {{ Session::get('message') }}</div>--}}
            {{--@endif--}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-inline">
                                <label>Trạng thái giao hàng: </label>
                                <select name="status_filter" id="status_filter" class="form-control input-inline" style="width: 200px">
                                    <option {{$status =='-1'?'selected':'' }} value="-1">Tất cả</option>
                                    <option {{$status =='0'?'selected':'' }} value="0">Chờ xử lý</option>
                                    <option {{$status =='1'?'selected':'' }} value="1">Xác nhận đơn hàng</option>
                                    <option {{$status =='2'?'selected':'' }} value="2">Hủy đơn hàng</option>
                                    <option {{$status =='3'?'selected':'' }} value="3">Kết thúc đơn hàng</option>
                                </select>

                                <input type="button" id="filter_order" onclick="filter_order()" value="Tìm" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <table class="tableView">
                                <thead>
                                <tr role="row">
                                    <th >ID</th>
                                    <th>Tên người order</th>
                                    <th>Địa chỉ</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th>Action</th>
                                    {{--<th class="sorting col-md-2" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Xóa</th></tr>--}}
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{!! $item["mahd"] !!}</td>
                                        <td>{!! $item["ten"] !!}</td>
                                        <td>{!! $item["diachi"] !!}</td>
                                        <td>{!!$item['created_at'] !!}</td>
                                        {{--<td>{!! $item["created_at"] !!}</td>--}}
                                        <td>{!! $item["email"] !!}</td>
                                        @if ($item["status"] == '1')
                                            <td> Đã xác nhận</td>
                                        @elseif ($item["status"] == '2')
                                            <td> Đã hủy</td>
                                        @elseif ($item["status"] == '3')
                                            <td> Đã kết thúc</td>
                                        @else
                                            <td> Chờ xủ lý</td>
                                        @endif

                                        <td><a href="{!! url('/admin/order/listOrder_detail/'.$item["mahd"]) !!}">Detail</a></td>

                                        {{--<td><a href="{!! url('/admin/order/delete/'.$item["mahd"]) !!}"> Delete </a></td>--}}

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function filter_order() {
            var status = document.getElementById('status_filter').value;
            window.location.href='/admin/order/listOrder?status='+status;
        }
    </script>
@endsection