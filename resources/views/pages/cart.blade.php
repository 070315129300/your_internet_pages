@include('pages.header')
<!--/ End Header -->

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>

                        {{session()->get('message')}}
                    </div>
            @endif
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                    <tr class="main-hading">
                        <th>PRODUCT</th>
                        <th>NAME</th>
                        <th class="text-center">UNIT PRICE</th>
                        <th class="text-center">QUANTITY</th>
                        <th class="text-center">TOTAL</th>
                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $cartItem)
                    <tr>
                        <td class="image" data-title="No"><img src="productimage1/{{$cartItem->image}}" alt="#"></td>
                        <td class="product-des" data-title="Description">
                            <p class="product-name">{{$cartItem->productname}}</p>
                            <p class="product-des">{{$cartItem->details}}</p>
                        </td>
                        <td class="price" data-title="Price"><span>&#8358; {{$cartItem->price}} </span></td>
                        <td class="qty" data-title="Qty"><!-- Input Order -->
                            <div class="input-group">
                                <div class="button minus">
                                    <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[{{$cartItem->product_id}}]">
                                        <i class="ti-minus"></i>
                                    </button>
                        <span>
                            <a class="btn btn-danger" href="{{url('addquantity', $cartItem->id)}}"> add</a>
                        </span>
                                </div>
                                <input type="text" name="quant[{{$cartItem->product_id}}]" class="input-number" data-min="1" data-max="20" value="{{$cartItem->quantity}}">
                                <div class="button plus">
                                    <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$cartItem->product_id}}]">
                                        <i class="ti-plus"></i>
                                    </button>
                                    <span>
                            <a class="btn btn-danger" href="{{url('removequantity', $cartItem->id)}}"> remove</a>
                        </span>
                                </div>
                            </div>
                            <!--/ End Input Order -->
                        </td>
                        <td class="total-amount" data-title="Total"><span>&#8358; {{$cartItem->price * $cartItem->quantity}}</span></td>
                        <td class="action" data-title="Remove"><a onclick="return confirm('are you sure you want to remove this cart')" href="{{url('removecart', $cartItem->id)}}"><i class="ti-trash remove-icon"></i></a></td>
                    </tr>
                    @endforeach



                    </tbody>
                </table>
                <!--/ End Shopping Summery -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Total Amount -->
                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-5 col-12">
                            <div class="left">

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-7 col-12">
                            <div class="right">
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
                                <ul>


                                    <li>Cart Subtotal<span>&#8358; {{$grandTotal}}</span></li>

                                    <li>Shipping<span>free</span></li>
                                    <li class="last">You Pay<span>&#8358; {{$grandTotal}}</span></li>
                                </ul>
                                <div class="button5">
                                    <a href="checkoutpage" class="btn">Checkout</a>
                                    <a href="productpage" class="btn">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Total Amount -->
            </div>
        </div>
    </div>
</div>
<!--/ End Shopping Cart -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <div class="row no-gutters">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <!-- Product Slider -->
                        <div class="product-gallery">
                            <div class="quickview-slider-active">
                                <div class="single-slider">
                                    <img src="images/modal1.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal2.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal3.jpg" alt="#">
                                </div>
                                <div class="single-slider">
                                    <img src="images/modal4.jpg" alt="#">
                                </div>
                            </div>
                        </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>Flared Shift Dress</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="#"> (1 customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                </div>
                            </div>
                            <h3>$29.00</h3>
                            <div class="quickview-peragraph">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                            </div>
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Size</h5>
                                        <select>
                                            <option selected="selected">s</option>
                                            <option>m</option>
                                            <option>l</option>
                                            <option>xl</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Color</h5>
                                        <select>
                                            <option selected="selected">orange</option>
                                            <option>purple</option>
                                            <option>black</option>
                                            <option>pink</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity">
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <div class="add-to-cart">
                                <a href="#" class="btn">Add to cart</a>
                                <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                            </div>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

@include('pages.footer')
