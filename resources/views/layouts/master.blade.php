<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodeLab Shop</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>
    <!-- Custom Fonts -->
    <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>

    <script src="http://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @yield('scripts')
</head>
<body>

    <div  class=" container-fluid row header nospace" style="">
        @if (Auth::guest())
        <div class="col-md-2 col-md-offset-2 col-xs-6 col-sm-6">
            <a href="/login" ><i class="fa fa-unlock-alt"  style="color: #2fdab8;"></i> Sign In</a>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6">
            <a href="/register" ><i class="fa fa-pencil-square-o" style="color: #2fdab8;"></i> Sign Up</a>
        </div>
        @else
            <div class="col-md-2 col-md-offset-2 col-xs-6 col-sm-6">
                  <a href="#" >
                      <i class="fa fa-user"style="color: #2fdab8;"></i> {{ Auth::user()->full_name }}
                  </a>
            </div>
            <div class="col-md-2 col-xs-6 col-sm-6">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" style="color: #2fdab8;"></i>  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        @endif
        <div class="col-md-2 col-xs-6 col-sm-6">
            <p class="nospace"><i class="fa fa-phone" style="color: #2fdab8;"></i> Call : +1 234 567 8901</p>
        </div>
        <div class="col-md-2 col-xs-6 col-sm-6">
            <p class="nospace"><i class="fa fa-envelope-o" style="color: #2fdab8;"></i> info@codelabshop.com</p>
        </div>
    </div>

    <div class="row container-fluid logo-search nospace">
        <div class="col-md-5 col-md-offset-1 col-sm-12 col-xs-12 logo lead" style="margin-bottom: 10px;">
            <p><span>C</span>odeLab Shop</p>
        </div>
        <div class="col-md-5 col-sm-12 col-xs-12" style="margin-bottom: 10px; margin-left: 10px; margin-top: 12px">

            <form method="post" action="/search/getSearchItem/">
                {{ csrf_field() }}
                <div class="search-form">
                    <input type="text" name="s" placeholder="Search here..." value="{{  isset($s) ? $s: '' }}">
                    <button type="submit" class="btn btn-default">Go !</button>
                </div>
            </form>

        </div>
    </div>



    <nav class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/" class="nav-link @yield('home')">Home</a></li>
                    <li><a href="/item" class="nav-link @yield('ShopNow')">Shop Now!</a></li>
                    @if(Auth::user()->status==0)
                        <li><a href="/about" class="nav-link @yield('about')">About Us</a></li>
                        <li><a href="/dashboard" class="nav-link">Dashboard</a></li>
                    @else
                        <li><a href="/about" class="nav-link @yield('about')">About Us</a></li>
                </ul>
                        <ul class="nav navbar-nav navbar-right" style=";">
                            <li><a href="/orders/all/{{Auth::user()->id}}"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></li>
                        </ul>
                    @endif

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
    </nav>

    @yield('content')


    <div class="row nospace container-fluid" style="padding: 50px;">
        <div class="col-md-3 col-sm-6 col-xm-12 our-service" style="margin-bottom: 15px;">
            <div class="row nospace">
                <div class="col-sm-3 col-xs-3 our-service-left"><i class="fa fa-truck"></i></div>
                <div class="col-sm-9 col-xs-9 our-service-right">
                    <h3>FREE SHIPPING</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xm-12 our-service" style="margin-bottom: 15px;">
            <div class="row nospace">
                <div class="col-sm-3 col-xs-3 our-service-left"><i class="fa fa-headphones"></i></div>
                <div class="col-sm-9 col-xs-9 our-service-right">
                    <h3>24/7 SUPPORT</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>

        </div>
        <div class="col-md-3 col-sm-6 col-xm-12 our-service" style="margin-bottom: 15px;">
            <div class="row nospace">
                <div class="col-sm-3 col-xs-3 our-service-left"><i  class="fa fa-shopping-bag"></i></div>
                <div class="col-sm-9 col-xs-9 our-service-right">
                    <h3>MONEY BACK <br/>GUARANTEE</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xm-12 our-service" style="margin-bottom: 15px;">
            <div class="row nospace">
                <div class="col-sm-3 col-xs-3 our-service-left"><i class="fa fa-gift"></i></div>
                <div class="col-sm-9 col-xs-9 our-service-right">
                    <h3>FREE GIFT COUPONS</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row nospace" style="background-color: #222222; padding-top: 100px;">
        <div class="container">
            <div class="col-md-4" style="margin-bottom: 20px;">
                <p class="footer-logo"><span>C</span>odeLab Shop</p>
                <p class="footer-logo-des">Lorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.</p>
            </div>
            <div class="col-md-4" style="margin-bottom: 20px;">
                <p class="footer-links-title"><span>Our</span> Information</p>
                <li class="footer-links" style="padding-top:30px ;"><a href="/">Home</a></li>
                <li class="footer-links"><a href="#">Shop Now!</a></li>
                <li class="footer-links"><a href="#">About Us</a></li>
            </div>
            <div class="col-md-4" style="margin-bottom: 20px;">
                <p class="footer-links-title"><span>Shop</span> Information</p>

                <div class="shop-info">
                    <div class="shop-info-grid">
                        <div class="shop-info-left">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="shop-info-right">
                            <h6>Phone Number</h6>
                            <p>+1 234 567 8901</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="shop-info-grid">
                        <div class="shop-info-left">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="shop-info-right">
                            <h6>Email Address</h6>
                            <p><a href="mailto:example@email.com"> info@codelabshop.com</a></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="shop-info-grid">
                        <div class="shop-info-left">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="shop-info-right">
                            <h6>Location</h6>
                            <p>Broome St, NY 10002,California, USA.

                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row nospace copy-right">
            <div class="col-lg-6 col-lg-offset-3">
                <p class="text-center">© 2017 CodeLab Shop. All rights reserved | Design by <span>Oulla Alorfaly</span></p>
            </div>
        </div>
    </div>

</body>
</html>