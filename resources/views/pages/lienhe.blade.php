@extends('master')
@section('content')

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Contact Us</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Liên hệ</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap_bottom">
        <div class="container">
            <div class="row contact">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Tổng đài hỗ trợ: 19002099</h6>
                            <p>Hà nội:(024).73045566</p>
                            <p>Hồ Chí Minh:(028).73045566</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>Chăm sóc khách hàng & Giài đáp thắc mắc:</h6>
                            <p>19002098 (08:30-21:30)</p>
                            <p>email:cskh@karma.com</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6>Tư vấn và mua hàng trực tuyến:</h6>
                            <p>19002098 (08:30-21:30)</p>
                            <p>email:online@karma.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ và tên'">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Điện thoạit" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Điện thoại'">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Tiêu đề" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tiêu đề'">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Nội dung" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nọi đung"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="primary-btn">Gửi thông tin liên hệ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->



@endsection