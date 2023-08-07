<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="adminstyle.css">

    <title>SMA</title>
</head>
<body>
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
                        <a class="active" >Order</a>
                    </li>

                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>All Order</h3>

                </div>
                <table>
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity</th>
                        <th>Payment Status</th>
                        <th>Time of Order</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $products)
                        <tr>
                            <td>
                                <img src="productimage1/{{$products->image}}">
                            </td>
                            <td>{{$products->firstname}}</td>
                            <td>{{$products->lastname}}</td>

                            <td>{{$products->phone}}</td>
                            <td>{{$products->address}}</td>
                            <td>{{$products->productname}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td>{{$products->payment_status}}</td>
                            <td>{{$products->created_at}}</td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>
                {{$order->links()}}
            </div>

        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>
</html>
