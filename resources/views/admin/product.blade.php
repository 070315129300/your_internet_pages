@include('admin.header')
@include('admin.sidebar')

<!-- CONTENT -->
<section id="content">
@include('admin.navbar')

<!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right' ></i></li>
                    <li>
                        <a class="active" href="#">Product</a>
                    </li>

                </ul>
            </div>
            <li style="text-align: right">
                <a href="addproduct">AddProduct</a>
            </li>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>All Product</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Brand Name</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $products)
                    <tr>

                        <td>{{$products->name}}</td>
                        <td>{{$products->brandname}}</td>
                        <td>{{$products->price}}</td>
                        <td>
                            <img src="productimage/{{$products->image1}}">
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>
</html>
