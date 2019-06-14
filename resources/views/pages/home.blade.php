@extends('master')
@section('content')

<!-- start banner Area -->
<section class="banner-area">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-start" >
            <div class="col-lg-12" style="margin: 121px 0px">
                <div class="active-banner-slider">
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">

                        <div class="col-lg-12" >
                            <div class="banner-img" >
                                <img class="img-fluid " src="karma/img/banner/Banner2.png"  alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">

                        <div class="col-lg-12" >
                            <div class="banner-img" >
                                <img class="img-fluid " src="karma/img/banner/Banner1.png"  alt="">
                            </div>
                        </div>
                    </div>
                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">

                        <div class="col-lg-12" >
                            <div class="banner-img" >
                                <img class="img-fluid " src="karma/img/banner/Banner3.jpg"  alt="">
                            </div>
                        </div>
                    </div>

                    <!-- single-slide -->
                    <div class="row single-slide align-items-center d-flex">

                        <div class="col-lg-12" >
                            <div class="banner-img" >
                                <img class="img-fluid " src="karma/img/banner/Banner4.jpg"  alt="">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<!-- End banner Area -->


<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container main2">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="karma/img/features/f-icon1.png" alt="">
                    </div>
                    <h6>Giao hàng miễn phí toàn quốc</h6>
                    {{--<p>Free Shipping on all order</p>--}}
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="karma/img/features/f-icon2.png" alt="">
                    </div>
                    <h6>1 đổi 1 trong 30 ngày Bảo hành chính hãng 12 tháng</h6>
                    {{--<p>Free Shipping on all order</p>--}}
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="karma/img/features/f-icon3.png" alt="">
                    </div>
                    <h6>Hỗ trợ 24/7</h6>
                    {{--<p>Free Shipping on all order</p>--}}
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="karma/img/features/f-icon4.png" alt="">
                    </div>
                    <h6>Bảo mật thanh toán</h6>
                    {{--<p>Free Shipping on all order</p>--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->
<section class="section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Sản phẩm bán chạy</h1>
                    </div>
                </div>
            </div>
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <div class="row">
                <!-- single product -->
                @foreach($product1 as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="/chitietsanpham/{!! $item->idsp !!}"><img class="img-fluid" src="{!! $item->hinhanh !!}" alt=""></a>
                            <div class="product-details">
                                <a href="/chitietsanpham/{!! $item->idsp !!}"><h6>{!! $item->tensp !!}</h6></a>
                                <div class="price">
                                    <h6>{!! number_format($item->gia,0,",",".") !!} VNĐ</h6>
                                    {{--<h6 class="l-through">$210.00</h6>--}}
                                </div>
                                <div class="prd-bottom">

                                    <a  href="javascript:updateCart('{!!$item->idsp!!}','1')" class="social-info">
                                        <span  class="fa fa-shopping-cart"></span>
                                    </a>
                                    <a href="/chitietsanpham/{!! $item->idsp !!}" class="social-info">
                                        <span class="">Mua</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            </form>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Sản phẩm mới</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->
                @foreach($product2 as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <a href="/chitietsanpham/{!! $item->idsp !!}"><img class="img-fluid"  src="{!! $item->hinhanh !!}" alt=""></a>
                            <div class="product-details">
                                <h6>{!! $item->tensp !!}</h6>
                                <div class="price">
                                    <h6>{!! number_format($item->gia,0,",",".") !!} VNĐ</h6>
                                    {{--<h6 class="l-through">$210.00</h6>--}}
                                </div>
                                <div class="prd-bottom">

                                    <a  href="javascript:updateCart('{!!$item->idsp!!}','1')" class="social-info">
                                        <span  class="fa fa-shopping-cart"></span>
                                    </a>
                                    <a href="/chitietsanpham/{!! $item->idsp !!}" class="social-info">
                                        <span class="">Mua</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection