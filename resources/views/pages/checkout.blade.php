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
                                    <input type="email" name="email" placeholder="" id="emailinput" required="required" value="{{Auth::user()->email}}">
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
                                    <label>Address Line <span>*</span></label>
                                    <input type="text" name="address" placeholder="delivery address" id="addressInput" required="required" >
                                </div>
                            </div>
{{--                                    //--}}
{{--                            <!-- Address Input -->--}}
{{--                            <input type="text" name="address" id="addressInput" placeholder="" required="required">--}}

{{--                            <!-- Display the address in another span tag -->--}}
{{--                            <span id="addressDisplay"></span>--}}

{{--                            <!-- Display the address in another input field -->--}}
{{--                            <input type="text" name="displayAddress" id="displayAddressInput" readonly>--}}

{{--                            //--}}
                        </div>
                    </form>
                    <!--/ End Form -->
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="order-details">
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <ul style="display: none">
                            @php
                                $grandTotal = 0; // Initialize the grand total variable
                            @endphp

                            @foreach($cart as $product)
                                <li>{{$product->name}} - {{$product->quantity}} x &#8358;{{$product->price}} = &#8358;{{$product->price * $product->quantity}}</li>
                                @php
                                    $grandTotal += $product->price * $product->quantity; // Add the subtotal to the grand total
                                @endphp
                            @endforeach

                        </ul>

                        <h2>CART  TOTALS</h2>
                        <div class="content">
                            <ul>
                                <li>Sub Total<span>&#8358; {{$grandTotal}}</span></li>
                                <li>(+) Shipping<span>free</span></li>
                                <li class="last">Total<span>&#8358; {{$grandTotal}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <!--/ End Order Widget -->
                    <!-- Order Widget -->
                    <div class="single-widget">
                        <h2>Payments</h2> <br>
                        <div class="single-widget get-button">
                            <div class="content">
                                <form method="post" action="payondelivery" enctype="multipart/form-data" id="yourFormId">
                                    @csrf
                                    <input type="hidden" name="amount" value="{{$grandTotal}}"> {{-- required in kobo --}}
                                    <input type="hidden" name="currency" value="NGN">
                                    <input type="hidden" name="address" id="addressDisplay" readonly required>
                                    <button class="btn btn-success btn-lg btn-block" type="submit">
                                        pay on delivery
                                    </button>
                                </form>

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

                    <div class="single-widget payement">
                        <div class="content">
                    <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form" id="yourFormId">
                       @csrf
                        <div class="row" style="margin-bottom:40px;">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="hidden" name="email" id="emailinput" value="{{Auth::user()->email}}"> {{-- required --}}
                                <input type="hidden" name="amount" value="{{$grandTotal}}"> {{-- required in kobo --}}
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="address" id="displayAddressInput" readonly required>

                                    <button class="btn btn-success btn-lg btn-block" type="submit">
                                        Pay Now
                                    </button>

                            </div>
                        </div>
                    </form>
                    </div>
                    </div>


                    <!--/ End Button Widget -->
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Get the address input and the target elements
    const addressInput = document.getElementById('addressInput');
    const addressDisplay = document.getElementById('addressDisplay');
    const displayAddressInput = document.getElementById('displayAddressInput');

    // Listen for the "input" event on the address input field
    addressInput.addEventListener('input', function () {
        const addressValue = addressInput.value;

        // Update the content of the target span and input elements
        addressDisplay.value = addressValue;
        displayAddressInput.value = addressValue;
    });
</script>
<script>
    // Get the form and the hidden input field
    const form = document.getElementById('yourFormId'); // Replace 'yourFormId' with the actual ID of your form
    const payondivaddressInput = document.getElementById('addressDisplay');
    const addressInput = document.getElementById('displayAddressInput');

    console.log(payondivaddressInput);

    // Listen for form submission
    form.addEventListener('submit', function (event) {
        // Check if the hidden input field has a value
        if (addressInput.value.trim() === '' || payondivaddressInput.value.trim() === '') {
            // If the hidden input is empty, prevent form submission
            event.preventDefault();
            // Optionally, you can show an error message or take other actions here
        }


    });
</script>


<!--/ End Checkout -->

@include('pages.footer')
