
@extends('master')
@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.html">Sản phẩm<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Giá (VNĐ)</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Xóa</th>
                        <th scope="col">Tổng</th>
                    </tr>
                    </thead>
                    <tbody>
                    <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                        @foreach($content as $item)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{!! asset($item->options->image)  !!}" alt=""  height="50", width="60">
                                    </div>
                                    <div class="media-body">
                                        <p>{!! $item->name !!}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5 >{!! number_format($item->price,0,",",".") !!}</h5>
                                <input id="price_{!! $item->rowId !!}" type="hidden" value="{!! $item->price !!}"/>
                            </td>
                            <td>
                                <div class="product_count">
                                    <input type="text" class= "qty" name="qty" id="{!! $item->rowId !!}" value='{!! $item->qty !!}' title="Quantity:"
                                           class="input-text qty">
                                    <button onclick="updateQty('{!!$item->rowId!!}','1')"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up stt"></i></button>
                                    <button onclick="updateQty('{!!$item->rowId!!}','-1')"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                </div>
                            </td>
                            <td class="abc">
                                <a href="/xoasanpham/{!! $item->rowId !!}" class="fa fa-trash fa-fw"></a>

                            </td>
                            <td>
                                <h5 id="tongtien_{!! $item->rowId !!}">{!! number_format($item->price * $item->qty ,0,",",".") !!} </h5>
                            </td>
                        </tr>
                        @endforeach
                    </from>
                        <tr class="bottom_button">
                        <td>

                            <a class="gray_btn" href="{!! URL('dathang') !!}">Mua Hàng</a>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            <h5>Tổng tiền </h5>
                        </td>
                        <td>
                            <h5 id="tongtien">{!! $total !!} VNĐ</h5>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection