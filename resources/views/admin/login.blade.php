<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


    <!-- General meta information -->
    <title>Login Form by Oussama Afellad</title>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="robots" content="index, follow"/>
    <meta charset="utf-8"/>
    <!-- // General meta information -->


    <!-- Load Javascript -->
    <script type="text/javascript" src="{{url('admin/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/js/jquery.query-2.1.7.js')}}"></script>
    <script type="text/javascript" src="{{url('admin/js/rainbows.js')}}"></script>
    <!-- // Load Javascipt -->

    <!-- Load stylesheets -->
    <link rel="stylesheet" href="{{url('admin/css/style.css')}}" media="screen"/>
    <!-- // Load stylesheets -->

    <script>


        $(document).ready(function () {

            $("#submit1").hover(
                function () {
                    $(this).animate({"opacity": "0"}, "slow");
                },
                function () {
                    $(this).animate({"opacity": "1"}, "slow");
                });
        });


    </script>

</head>
<body>

<div id="wrapper">
    <div id="wrappertop"></div>


    <div id="wrappermiddle">
        <form action="/login_submit" method="post" accept-charset="utf-8">
            @csrf
            <h2>Login</h2>

            <div id="username_input">

                <div id="username_inputleft"></div>

                <div id="username_inputmiddle">

                    <input type="text" name="username" id="url" value="username" onclick="this.value = ''">
                    <img id="url_user" src="{{url('admin/images/mailicon.png')}}" alt="">

                </div>

                <div id="username_inputright"></div>

            </div>

            <div id="password_input">

                <div id="password_inputleft"></div>

                <div id="password_inputmiddle">

                    <input type="password" name="password" id="url" value="Password" onclick="this.value = ''">
                    <img id="url_password" src="{{url('admin/images/passicon.png')}}" alt="">

                </div>

                <div id="password_inputright"></div>

            </div>

            <div id="submit">

                <input type="image" src="{{url('admin/images/submit_hover.png')}}" id="submit1" value="Sign In">
                <input type="image" src="{{url('admin/images/submit.png')}}" id="submit2" value="Sign In">

            </div>


            <div id="links_left">

                <a href="#">Forgot your Password?</a>

            </div>

            <div id="links_right"><a href="#">Not a Member Yet?</a></div>
        </form>
    </div>
</div>

</body>
</html>