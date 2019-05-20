
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
            <form action="/addDonhang"  method="post" class="form-horizontal" >
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Thông tin mua hàng</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control abcd" id="name" name="name"  placeholder="Họ và tên *">
                                </div>

                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="number" name="number" placeholder="Số điện thoại">
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" name="add1" placeholder="Địa chỉ nhận hàng">
                                </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="order_box">
                                <h2>Đơn hàng</h2>
                                <ul class="list">
                                    <li><a href="#" >Sản phẩm <span>Tổng</span></a></li>
                                    @foreach($content as $item)
                                    <li><a href="#" name="sp">{!! $item->name !!} <span class="middle" name="soluong">x {!! $item->qty !!}</span> <span class="last">{!! number_format($item->price * $item->qty ,0,",",".") !!}</span></a></li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li><a href="#" >Tổng Tiền  <span name="tongtien">{!! Cart::subtotal(0, ',', '.') !!}</span></a></li>
                                </ul>
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

