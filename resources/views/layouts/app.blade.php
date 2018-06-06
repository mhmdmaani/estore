<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EStore') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            <div class="header_top"><!--header_top-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
      <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" >
                      EStore
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                        @if(Auth::user())
                        <li><a href="/myads">My ads</a></li>
                        <li><a href="/savedads">Saved items</a></li>
                        <li><a href="/">Messages</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="text-center" >
                            <a href="#">
                                <i class="fa fa-comments fa-lg"></i>
                            </a>
                            <a>
                                 <i class="fa fa-globe fa-lg" ></i>
                            </a>
                        </li>
                        <li class="text-center" ></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" >
                                <i class="fa fa-user"></i>   {{Auth::user()->name}}
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endif

                    </ul>
                </div>
            </div>
        </nav>

         @include('partials.errors')
         @include('partials.success')
        @yield('content')
</div>
<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe1.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe2.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe3.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="images/home/iframe4.png" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="images/home/map.png" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>popular Categories</h2>
                        <ul class="nav nav-pills nav-stacked">
                          @foreach($footerCat->take(5) as $footCat)
                            <li><a href="category/{{$footCat->id}}">{{$footCat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright ©  Inc. All rights reserved.</p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/jquery.scrollUp.min.js"></script>
<script src="/js/price-range.js"></script>
<script src="/js/jquery.prettyPhoto.js"></script>
<script src="/js/main.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="{{ asset('js/bootstrap-tagsinput.js')}}"></script>
<script src="{{ asset('js/plugin.js') }}"></script>
</body>
</html>
