<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="{{url('/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{url('/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--[if lt IE 9]>
    <script src="{{url('/js/html5shiv.js')}}"></script>
    <script src="{{url('/js/respond.min.js')}}"></script>
    <![endif]-->
    <!--  webfonts  -->
    <link href='{{url('/css/webfont.css')}}' rel='stylesheet' type='text/css'>
    <!-- // webfonts  -->
    <link href="{{url('/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- start plugins -->
    <script type="text/javascript" src="{{url('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/form.js')}}"></script>
</head>
<body>
<div class="header_bg"><!-- start header -->
    <div class="container">
        <div class="row header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('/images/title.png')}}" alt="" class="img-responsive"/> </a>
                    </div>
                    <div class="title"><h2></h2></div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="menu nav navbar-nav navbar-right ">
                            @if (Auth::Check() == false)
                                <li><a href="{{url('/')}}">beranda</a></li>
                                <li><a href="{{url('/about')}}">tentang kami</a></li>
                                <li><a href="{{url('/login')}}">login</a></li>
                            @else
                                <li><a href="{{url('/home')}}">beranda</a></li>
                                <li><a href="{{url('/setting')}}">pengaturan</a></li>
                                @if (Auth::user()->isAdmin())
                                    <li><a href="{{url('/admin/home')}}">laman admin</a></li>
                                @endif
                                <li id="logoutLink"><a href="{{url('/logout')}}">logout</a></li>
                                <script type="text/javascript">
                                    $('#logoutLink').click(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'get',
                                            url: 'http://e-gov-bandung.tk/dukcapil/api/public/auth/logout',
                                            success: function(data) {
                                                console.log('Info logout success');
                                            },
                                            error: function(data) {
                                                console.log('Info logout fail');
                                            }
                                        });
                                    })
                                </script>
                            @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <ol class="breadcrumb">
            @yield('breadcrumb')
        </ol>
        <div class="row slider text-center">
            @yield('slider')
        </div>
    </div>
</div>
<div class="main"><!-- start main -->
    <div class="container main">
        @yield('content')
    </div>
</div>
<div class="footer_bg"><!-- start footer -->
    <div class="container">
        <div class="row  footer">
            <div class="col-md-6 span1_of_4">
                <h4>Tentang Kami</h4>
                <p>Dinas Pelayanan Pajak Kota Bandung</p>
                <h5>Alamat</h5>
                <p class="top">Jl. Wastukencana No.2,</p>
                <p>Bandung,</p>
                <p>Telepon:(022) 7215323</p>
                <p>Twitter: @disyanjakkotbdg</p>
            </div>
            <div class="col-md-6 span1_of_4">
                <h4>Informasi Terbaru</h4>
                <span><a href="#"> Tata Cara Pembayaran Pajak </a></span>
                <span><a href="#">Daftar Peraturan Daerah (Download)</a></span>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="footer_btm"><!-- start footer_btm -->
    <div class="container">
        <div class="row  footer1">
            <div class="col-md-5">
                <div class="soc_icons">
                    <ul class="list-unstyled">
                        <li><a class="icon1" href="#"></a></li>
                        <li><a class="icon2" href="#"></a></li>
                        <li><a class="icon3" href="#"></a></li>
                        <li><a class="icon4" href="#"></a></li>
                        <li><a class="icon5" href="#"></a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 copy">
                <p class="link text-right"><span>&#169; All rights reserved | Design by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
@yield('javascript')
</script>
</body>
</html>