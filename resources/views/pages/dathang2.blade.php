
@extends('master')
@section('action','Add')
@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Mua hàng</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="index.html">Sản phẩm<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Mua hàng</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/addDonhang"  method="post" class="form-horizontal" >
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Thông tin mua hàng</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="name"  placeholder="Họ và tên" required>
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="number" name="number" placeholder="Số điện thoại" required>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" name="add1" placeholder="Địa chỉ nhận hàng" required>
                                </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="order_box">
                                <h2>Đơn hàng</h2>
                                <table class="list" style="width:100%">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                    @foreach($content as $sp)
                                        @if($sp->id == $idsp)
                                        <td name="name1">{!! $sp->name !!}</td>
                                        <td name="soluong">{!! $sp->qty !!}</td>
                                        <td name="tong">{!! number_format($sp->price * $sp->qty ,0,",",".") !!}  </td>
                                        @endif
                                    @endforeach
                                </table>
                                    <div class="list list_2">
                                    <li><a href="#" >Tổng cộng  <span name="tongtien">{!! Cart::subtotal(0, ',', '.') !!}</span></a></li>
                                </div>
                                    <button type="submit" name="submit" class="primary-btn">Mua hàng</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection

