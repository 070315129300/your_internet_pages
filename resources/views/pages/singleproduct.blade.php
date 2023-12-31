@include('pages.header')
<base href="/public">
<!--/ End Header -->

    <link rel="stylesheet" href="style.css">
<div class="flex-box">
    <div class="left">
        <div class="big-img">
            <img src="productimage1/{{$product->image1}}" style="height: 400px; width: 300px;">
        </div>
        <div class="images">
            <div class="small-img">
                <img src="productimage1/{{$product->image1}}" onclick="showImg(this.src)">
            </div>
            <div class="small-img">
                <img src="productimage2/{{$product->image4}}" onclick="showImg(this.src)">
            </div>
            <div class="small-img">
                <img src="productimage3/{{$product->image3}}" onclick="showImg(this.src)">
            </div>
            <div class="small-img">
                <img src="productimage4/{{$product->image4}}" onclick="showImg(this.src)">
            </div>
        </div>
    </div>

    <div class="right">
        <div class="url">Home > Product > {{$product->categories}}</div>
        <div class="pname">{{$product->categories}}</div>
        <div class="pname">{{$product->name}}</div>
        <div class="size" ><p>{{$product->brandname}}</p></div>
        <div class="size"><p>{{$product->details}}</p></div>
        <div class="price">{{$product->price}}</div>
        <div class="size">
            <p>Size :</p>
            <div class="psize active">M</div>
            <div class="psize">L</div>
            <div class="psize">XL</div>
            <div class="psize">XXL</div>
        </div>
        <div class="btn-box">

            <form action="addcart/{{$product->id}}"method="post" enctype="multipart/form-data">
                @csrf
                <div class="quantity">
                    <p>Quantity :</p>
                    <input type="number" min="1" max="20" value="1" name="quantity">
                </div>
                <br>
                <submit><a>add to cart</a> </submit>
                <input type="submit" value="add" class="cart-btn">
            </form>
        </div>
    </div>
</div>


<script>
    let bigImg = document.querySelector('.big-img img');
    function showImg(pic){
        bigImg.src = pic;
    }
</script>
<!-- Start Footer Area -->
@include('pages.footer')
