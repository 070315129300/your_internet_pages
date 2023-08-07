<!DOCTYPE html>
<html lang="zxx">
<head>
    <base href="/public">
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>SMA</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <!-- Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">



</head>
<body class="js">

{{--<!-- Preloader -->--}}
{{--<div class="preloader">--}}
{{--    <div class="preloader-inner">--}}
{{--        <div class="preloader-icon">--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- End Preloader -->--}}


<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i>+234 (0) 8021398878</li>
                            <li><i class="ti-email"></i> support@ayo.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-7 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">

                            <li><i class="ti-user"></i> <a href="#">My account</a></li>
                            @if( Auth::user())
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            <i class="ti-power-off"></i>Logout

                                        </x-dropdown-link>
                                    </form>
                                </li>
                            @else
                                <li><i class="ti-power-off"></i><a href="login">Login</a></li>
                                <li><i class="ti-power-off"></i><a href="register">Register</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/"><img src="images/logo.jpeg" style="height: 50px; width: 80px; " alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option selected="selected">All Category</option>
                                @foreach($category as $categories)
                                    <option href="">{{$categories->name}}</option>
                                @endforeach

                            </select>
                            <form>
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        @if( ! Auth::user())
                            <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                            </div>
                        @else
                            <div class="sinlge-bar">
                                <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true">Hello {{Auth::user()->firstname}}</i></a>

                            </div>
                        @endif


                        <div class="sinlge-bar shopping">
                            @if (is_string($cart))
                                <a class="single-icon"><i class="ti-bag"></i> <span class="total-count"></span></a>

                            @else
                                <a href="cartpage" class="single-icon"><i class="ti-bag"></i> <span class="total-count"></span></a>
                        @endif
                        <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span> Items</span>
                                    @if (is_string($cart))
                                        <a>View Cart</a>
                                    @else
                                        <a href="cartpage">View Cart</a>
                                    @endif
                                </div>

                                @if (is_string($cart))
                                    <p>login to see cart items</p>
                                @else
                                    <ul class="shopping-list">
                                        @foreach ($cart as $carts)
                                            <li>
                                                <td class="action" data-title="Remove"><a onclick="return confirm('are you sure you want to remove this cart')" href="{{url('removecart', $carts->id)}}"><i class="ti-trash remove-icon"></i></a></td>
                                                <a class="cart-img" href="cartpage"><img src="productimage1/{{$carts->image}}" alt="#"></a>
                                                <h4><a href="cartpage">{{$carts->productname}}</a></h4>
                                                <p class="quantity">1x - <span class="amount">{{$carts->price}}</span></p>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="bottom">

                                        <a href="checkoutpage" class="btn animate">Checkout</a>
                                    </div>
                                @endif

                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">

                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="active"><a href="/">Home</a></li>
                                            <li><a href="productpage">Product</a></li>
                                            <li><a href="contact">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->

