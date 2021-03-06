<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="{!! url('karma/css/linearicons.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/themify-icons.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/owl.carousel.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/nice-select.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/nouislider.min.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/ion.rangeSlider.css') !!}" />
    <link rel="stylesheet" href="{!! url('karma/css/ion.rangeSlider.skinFlat.css') !!}" />
    <link rel="stylesheet" href="{!! url('karma/css/magnific-popup.css') !!}">
    <link rel="stylesheet" href="{!! url('karma/css/main.css') !!}">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>--}}
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
<!-- Start Header Area -->
    @include('blocks.header')
<!-- End Header Area -->


<!-- start product Area -->
    @yield('content')
<!-- end product Area -->


<!-- Start brand Area -->
    @include('blocks.brand')
<!-- End brand Area -->


<!-- start footer Area -->
    @include('blocks.footer')
<!-- End footer Area -->


<script src="{!! url('karma/js/vendor/jquery-2.2.4.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="{!! url('karma/js/vendor/bootstrap.min.js') !!}"></script>
<script src="{!! url('karma/js/jquery.ajaxchimp.min.js') !!}"></script>
<script src="{!! url('karma/js/jquery.nice-select.min.js') !!}"></script>
<script src="{!! url('karma/js/jquery.sticky.js') !!}"></script>
<script src="{!! url('karma/js/nouislider.min.js') !!}"></script>
{{--<script src="{!! url('karma/js/countdown.js') !!}"></script>--}}
<script src="{!! url('karma/js/jquery.magnific-popup.min.js') !!}"></script>
<script src="{!! url('karma/js/owl.carousel.min.js') !!}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{!! url('karma/js/gmaps.min.js') !!}"></script>
<script src="{!! url('karma/js/main.js') !!}"></script>
<script src="{!! url('karma/js/myAjax.js') !!}"></script>
</body>

</html>