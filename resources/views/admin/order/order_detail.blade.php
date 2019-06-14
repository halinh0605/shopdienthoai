@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <section class="content-header">
            <h1>
                Chi tiết đơn hàng
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container123  col-md-6"   style="">
                                <h4></h4>
                                <table class="tableView">
                                    <thead>
                                    <tr>
                                        <th class="col-md-4">Thông tin khách hàng</th>
                                        <th class="col-md-6"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Thông tin người đặt hàng</td>
                                        <td>{{ $data1->ten }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đặt hàng</td>
                                        <td>{{ $data1->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại</td>
                                        <td>{{ $data1->dienthoai }}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ</td>
                                        <td>{{ $data1->diachi }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $data1->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Ghi chú</td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table class="tableView">
                                <thead>
                                <tr role="row">
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá </th>
                                    <th>Thành tiền</th>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                        <tr>

                                            <td>{!! $item["mahd"] !!}</td>
                                            <td>{!! $item["tensp"] !!}</td>
                                            <td>{!! $item["soluong"] !!}</td>
                                            <td>{{ number_format($item["gia"]) }} VNĐ</td>
                                            <td>{{ number_format($item["tongtien"]) }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                <tr>
                                    <td colspan="4"><b>Tổng tiền</b></td>
                                    <td colspan="1"><b class="text-red">{{ number_format($data1["donhang"]) }} VNĐ</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <form action="/admin/order/updateStatusOrder/{{ $data1->mahd }}" method="POST">

                            {{ csrf_field() }}
                            <div class="col-md-8"></div>
                            <div class="col-md-4">
                                <div class="form-inline">
                                    <label>Trạng thái giao hàng: </label>
                                    <select name="status" class="form-control input-inline" style="width: 200px">
                                        <option value="1">Xác nhận đơn hàng</option>
                                        <option value="2">Hủy đơn hàng</option>
                                        <option value="3">Kết thúc đơn hàng</option>
                                    </select>

                                    <input type="submit" value="Xử lý" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection