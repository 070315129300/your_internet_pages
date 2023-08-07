<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css
">

    <title>AdminHub</title>
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
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>

        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check' ></i>
                <span class="text">
						<h3>1020</h3>
						<p>Total Users</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-group' ></i>
                <span class="text">
						<h3>2834</h3>
						<p>Products</p>
					</span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle' ></i>
                <span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
            </li>
        </ul>


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Orders</h3>

                </div>
                <table>
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>First Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Payment Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $products)
                        <tr>
                            <td>
                                <img src="productimage1/{{$products->image}}">
                            </td>
                            <td>{{$products->firstname}}</td>
                            <td>{{$products->phone}}</td>
                            <td>{{$products->address}}</td>
                            <td>{{$products->productname}}</td>
                            <td>{{$products->price}}</td>
                            <td>{{$products->payment_status}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Message</h3>

                </div>
                <ul class="todo-list">
                    @foreach($message as $messages)
                        <li class="completed">
                            <h4>{{$messages->name}} :</h4>
                            <i class='bx bx-dots-vertical-rounded' >
                                {{$messages->message}}
                            </i>
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>
</html>
