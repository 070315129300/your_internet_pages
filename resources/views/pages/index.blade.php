<!DOCTYPE html>
<html lang="zxx">
<head>
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
{{--            <span></span>--}}
{{--            <span></span>--}}
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
                        <a href="/"><img src="images/logo3.jpeg" style="height: 70px; width: 80px; " alt="logo"></a>
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
                    <div class="col-lg-3">
                        <div class="all-category">
                            <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                            <ul class="main-category">
{{--                                <li class="main-mega"><a href="">best selling <i class="fa fa-angle-right" aria-hidden="true"></i></a>--}}
{{--                                    <ul class="mega-menu">--}}
{{--                                        <li class="single-menu">--}}
{{--                                            <a href="#" class="title-link">Shop Kid's</a>--}}
{{--                                            <div class="image">--}}
{{--                                                <img src="https://via.placeholder.com/225x155" alt="#">--}}
{{--                                            </div>--}}
{{--                                            <div class="inner-link">--}}
{{--                                                <a href="#">Kids Toys</a>--}}
{{--                                                <a href="#">Kids Travel Car</a>--}}
{{--                                                <a href="#">Kids Color Shape</a>--}}
{{--                                                <a href="#">Kids Tent</a>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li class="single-menu">--}}
{{--                                            <a href="#" class="title-link">Shop Men's</a>--}}
{{--                                            <div class="image">--}}
{{--                                                <img src="https://via.placeholder.com/225x155" alt="#">--}}
{{--                                            </div>--}}
{{--                                            <div class="inner-link">--}}
{{--                                                <a href="#">Watch</a>--}}
{{--                                                <a href="#">T-shirt</a>--}}
{{--                                                <a href="#">Hoodies</a>--}}
{{--                                                <a href="#">Formal Pant</a>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                        <li class="single-menu">--}}
{{--                                            <a href="#" class="title-link">Shop Women's</a>--}}
{{--                                            <div class="image">--}}
{{--                                                <img src="https://via.placeholder.com/225x155" alt="#">--}}
{{--                                            </div>--}}
{{--                                            <div class="inner-link">--}}
{{--                                                <a href="#">Ladies Shirt</a>--}}
{{--                                                <a href="#">Ladies Frog</a>--}}
{{--                                                <a href="#">Ladies Sun Glass</a>--}}
{{--                                                <a href="#">Ladies Watch</a>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                @foreach($category as $catogries)
                                <li><a href="">{{$catogries->name}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
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

<!-- Slider Area -->
<section class="hero-slider">
    <!-- Single Slider -->
    <div class="single-slider">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-9 offset-lg-3 col-12">
                    <div class="text-inner">
                        <div class="row">
                            <div class="col-lg-7 col-12">
                                <div class="hero-text">
                                    <h1><span style="color: white">UP TO 50% OFF </span>Watch For Man</h1>
                                    <p style="color: white">Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
                                    <div class="button">
                                        <a href="productpage" class="btn">Shop Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-info">
{{--                    <div class="nav-main">--}}
{{--                        <!-- Tab Nav -->--}}
{{--                        <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#man" role="tab">Man</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#women" role="tab">Woman</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kids" role="tab">Kids</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#accessories" role="tab">Accessories</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#essential" role="tab">Essential</a></li>--}}
{{--                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#prices" role="tab">Prices</a></li>--}}
{{--                        </ul>--}}
{{--                        <!--/ End Tab Nav -->--}}
{{--                    </div>--}}
                    <div class="tab-content" id="myTabContent">
                        <!-- Start Single Tab -->
                        <div class="tab-pane fade show active" id="man" role="tabpanel">
                            <div class="tab-single">
                                <div class="row">
                                    @foreach($trending as $products)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="singleproduct/{{$products->id}}">

                                                        <img class="default-img" src="productimage1/{{$products->image1}}" style="width: 500px; height: 350px;" alt="#">
                                                        {{--                                                    <img class="hover-img" src="productimage/{{$products->image}}" style="width: 550px; height: 330px;" alt="#">--}}
                                                    </a>
                                                    <div class="button-head">
                                                        {{--                                                    <div class="product-action">--}}
                                                        {{--                                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                                                        {{--                                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                                                        {{--                                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                                                        {{--                                                    </div>--}}
                                                        <div class="product-action-2">
                                                            <form action="addcart/{{$products->id}}"method="post" enctype="multipart/form-data">
                                                                @csrf

                                                                <input type="number" name="quantity" value="1" hidden>
                                                                <input class="btn btn-outline-warning" type="submit" value="add to cart">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3><a href="singleproduct/{{$products->id}}">{{$products->name}}</a></h3>
                                                    <div class="product-price">
                                                        <span>{{$products->price}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!--/ End Single Tab -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Area -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">

                        @foreach($topitem as $products)

                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="singleproduct/{{$products->id}}">

                                            <img class="default-img" src="productimage1/{{$products->image4}}" style="width: 500px; height: 350px;"  alt="#">
                                            {{--                                                    <img class="hover-img" src="productimage/{{$products->image}}" style="width: 550px; height: 330px;" alt="#">--}}
                                        </a>
                                        <div class="button-head">
                                            {{--                                                    <div class="product-action">--}}
                                            {{--                                                        <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>--}}
                                            {{--                                                        <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>--}}
                                            {{--                                                        <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>--}}
                                            {{--                                                    </div>--}}
                                            <div class="product-action-2">
                                                <form action="addcart/{{$products->id}}"method="post" enctype="multipart/form-data">
                                                    @csrf

                                                    <input type="number" name="quantity" value="1" hidden>
                                                    <input class="btn btn-outline-warning" type="submit" value="add to cart">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="singleproduct/{{$products->id}}">{{$products->name}}</a></h3>
                                        <div class="product-price">
                                            <span>{{$products->price}}</span>
                                        </div>
                                    </div>
                                </div>

                        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
<section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Watch</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                @foreach($watch as $watches)
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src='productimage1/{{$watches->image1}}' alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h4 class="title"><a href="#">{{$watches->name}}</a></h4>
                                <p class="price with-discount">{{$watches->price}}</p>
                                <form action="addcart/{{$products->id}}"method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="number" name="quantity" value="1" hidden>
                                    <input type="submit" value="Add To Cart" class="price with-discount">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Glass</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                @foreach($glass as $glasses)

                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src='productimage1/{{$glasses->image1}}' alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">{{$glasses->name}}</a></h5>
                                <p class="price with-discount">{{$glasses->price}}</p>
                                <form action="addcart/{{$products->id}}"method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="number" name="quantity" value="1" hidden>
                                    <input type="submit" value="Add To Cart" class="price with-discount">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>

            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Belt</h1>
                        </div>
                    </div>
                </div>
                <!-- Start Single List  -->
                @foreach($belt as $belts)
                <div class="single-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="list-image overlay">
                                <img src='productimage1/{{$belts->image1}}' alt="#">
                                <a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 no-padding">
                            <div class="content">
                                <h5 class="title"><a href="#">{{$belts->name}}</a></h5>
                                <p class="price with-discount">{{$belts->price}}</p>
                                <form action="addcart/{{$products->id}}"method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="number" name="quantity" value="1" hidden>
                                    <input type="submit" value="Add To Cart" class="price with-discount">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


                <!-- End Single List  -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Home List  -->


@include('pages.footer')
