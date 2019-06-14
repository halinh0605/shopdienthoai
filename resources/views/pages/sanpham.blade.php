
@extends('master')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Product page</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="#">Sản phẩm</a>

                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Danh mục sản phẩm</div>
                    <ul class="main-categories">
                        @foreach($loai_sp as $sp)
                        <li class="main-nav-list"><a  href="/sanpham/{!! $sp->madm !!}" ><span
                                        class="lnr lnr-arrow-right"></span>{!! $sp->tendm !!}</a>
                        </li>
                        @endforeach
                    </ul>
                 </div>
             </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                    {{--<div class="sorting" style=" height: 30px !important; line-height: 30px !important;">--}}
                        {{--<select>--}}
                            {{--<option value="a2z">Giá tăng dần</option>--}}
                            {{--<option value="z2a">Giá giảm dần</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--<div class="sorting mr-auto">--}}
                    {{--<select>--}}
                        {{--<option value="1">Show 12</option>--}}
                        {{--<option value="1">Show 12</option>--}}
                        {{--<option value="1">Show 12</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                <div class="pagination" style="margin-top: 7px;">
                    {{ $sp_theoloai->links() }}
                    {{--<a href="" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>--}}
                    {{--<a href="#" class="active">1</a>--}}
                    {{--<a href="#">2</a>--}}
                    {{--<a href="#">3</a>--}}
                    {{--<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>--}}
                    {{--<a href="#">{!! $sp_theoloai['last_page']!!}</a>--}}
                    {{--<a href="{!! $sp_theoloai['last_page_url']!!}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>--}}
                </div>

            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                @foreach($sp_theoloai as $sp)
                    <!-- single product -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <a href="/chitietsanpham/{!! $sp->idsp !!}"><img class="img-fluid" src="{{ asset($sp->hinhanh) }}" alt=""></a>
                            <div class="product-details">
                                <a href="/chitietsanpham/{!! $sp->idsp !!}"><h6>{!! $sp->tensp !!}</h6></a>
                                <div class="price">
                                    <h6>{!! number_format($sp->gia,0,",",".") !!} VNĐ</h6>

                                </div>
                                <div class="prd-bottom">

                                    <a  href="javascript:updateCart('{!!$sp->idsp!!}','1')" class="social-info">
                                        <span  class="fa fa-shopping-cart"></span>
                                    </a>
                                    <a href="/chitietsanpham/{!! $sp->idsp !!}" class="social-info">
                                        <span class="">Mua</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                {{--<div class="sorting mr-auto">--}}
                    {{--<select>--}}
                        {{--<option value="1">Show 12</option>--}}
                        {{--<option value="1">Show 12</option>--}}
                        {{--<option value="1">Show 12</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="pagination">--}}
                    {{--<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>--}}
                    {{--<a href="#" class="active">1</a>--}}
                    {{--<a href="#">2</a>--}}
                    {{--<a href="#">3</a>--}}
                    {{--<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>--}}
                    {{--<a href="#">6</a>--}}
                    {{--<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>--}}
                {{--</div>--}}
                <div class="pagination" style="margin-top: 7px;">
                    {{ $sp_theoloai->links() }}
                    {{--<a href="" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>--}}
                    {{--<a href="#" class="active">1</a>--}}
                    {{--<a href="#">2</a>--}}
                    {{--<a href="#">3</a>--}}
                    {{--<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>--}}
                    {{--<a href="#">{!! $sp_theoloai['last_page']!!}</a>--}}
                    {{--<a href="{!! $sp_theoloai['last_page_url']!!}" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>--}}
                </div>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>

@endsection


