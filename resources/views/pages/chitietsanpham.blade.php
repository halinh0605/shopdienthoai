
@extends('master')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Product Details Page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">sản phẩm<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">chi tiết sản phẩm</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-7 ">

                    <div id="demo" class="carousel slide article-slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($image as $item_image)
                                {{--@if ($loop->first)--}}
                                    {{--<li class="active"  data-target="#demo" data-slide-to="0">--}}
                                        {{--<img alt="" src="{{ asset($item_image->images) }}">--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                                <li class=""  data-target="#demo" data-slide-to="{{$loop->index}}">
                                    <img alt="" src="{{ asset($item_image->images) }}">
                                </li>
                            @endforeach
                        </ol>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            @foreach($image as $item_image )
                                @if ($loop->first)
                                    <div class="carousel-item active">
                                        <img src="{{ asset($item_image->images) }}" alt="" >
                                    </div>
                                @else
                                    <div class="carousel-item " >
                                        <img src="{{ asset($item_image->images) }}" alt="" >
                                    </div>
                                @endif
                            @endforeach


                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
            </div>

            <div class="col-lg-5 ">
                <div class="s_product_text">
                    <h3>{!! old('productName',isset($sanpham) ? $sanpham->tensp : '') !!}</h3>
                    <h2>{!! number_format(old('productName',isset($sanpham) ? $sanpham->gia : ''),0,",",".") !!} VNĐ</h2>
                    <div>{!! old('productName',isset($sanpham) ? $sanpham->motangan : '') !!}</div>
                    <div class="product_count">
                        <label for="qty">Quantity:</label>
                        <input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                    </div>
                    <div class="card_area d-flex align-items-center">
                        <a class="primary-btn" href="{!! URL('giohang',$sanpham->idsp) !!}">Thêm vào giỏ</a>

                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
                        <a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
                    </div>
                    <button type="button" class="btn btn-primary aa"><a  href="{!! URL('dathang',$sanpham->idsp) !!} ">MUA NGAY</a></button>

                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                   aria-selected="false">Specification</a>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div>{!! old('productName',isset($sanpham) ? $sanpham->noidung : '') !!}</div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <p>{!! old('productName',isset($sanpham) ? $sanpham->thongsokythuat : '') !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->

@endsection


