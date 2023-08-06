@include('pages.header')
<!--/ End Header -->

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="/">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Checkout -->
<section class="shop checkout section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="checkout-form">
                    <h2>Make Your Checkout Here</h2>

                    <!-- Form -->
                    <form class="form" method="post" action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>First Name<span>*</span></label>
                                    <input type="text" name="firstname" placeholder="" required="required"value="{{Auth::user()->firstname}}" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Last Name<span>*</span></label>
                                    <input type="text" name="lastname" placeholder="" required="required" value="{{Auth::user()->lastname}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Email Address<span>*</span></label>
                                    <input type="email" name="email" placeholder="" required="required" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Phone Number<span>*</span></label>
                                    <input type="number" name="number" placeholder="" required="required" value="{{Auth::user()->phone}}">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Address Line 1<span>*</span></label>
                                    <input type="text" name="address" placeholder="" required="required" >
                                </div>
                            </div>

                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>CART  TOTALS</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>$330.00</span></li>
                                <li>(+) Shipping<span>2500.00</span></li>
                                <li class="last">Total<span>$340.00</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Payments</h2> <br>
                        <div class="single-widget get-button">
                            <div class="content">
                                <div class="button">
                                    <a href="payondelivery" class="btn">pay on delivery</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Payment Method Widget -->
                    <div class="single-widget payement">
                        <div class="content">
                            <img src="images/payment-method.png" alt="#">
                        </div>
                    </div>
                    <!--/ End Payment Method Widget -->
                    <!-- Button Widget -->
                    <?php

                    $split = [
                        "type" => "percentage",
                        "currency" => "NGN",
                        "subaccounts" => [
                            [ "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 10 ],
                            [ "subaccount" => "ACCT_li4p6kte2dolodo", "share" => 30 ],
                        ],
                        "bearer_type" => "all",
                        "main_account_share" => 70
                    ];
                    ?>

                    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                       @csrf
                        <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-8 col-md-offset-2">
                                <p>
                                <div>
                                    Lagos Eyo Print Tee Shirt
                                    ₦ 2,950
                                </div>
                                </p>
                                <input type="hidden" name="email" value="otemuyiwa@gmail.com"> {{-- required --}}
                                <input type="hidden" name="orderID" value="345">
                                <input type="hidden" name="amount" value="800"> {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="3">
                                <input type="hidden" name="currency" value="NGN">
                                <p>
                                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                                    </button>
                                </p>
                            </div>
                        </div>
                    </form>


                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Checkout -->

@include('pages.footer')
