{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

{{--    <!-- Boxicons -->--}}
{{--    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>--}}
{{--    <!-- My CSS -->--}}
{{--    <link rel="stylesheet" href="adminstyle.css">--}}

{{--    <title>SMA</title>--}}
{{--</head>--}}
{{--<body>--}}
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
                        <a class="active" href="#">add product</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Add A Product</h3>

                </div>
                <form action="{{url('createProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div>
                       <label for="name">Product Name</label>
                       <input type="text" name="name" placeholder="name" id="name" class="form-control" >
                   </div>
                    <br>

                    <div>
                        <label for="price">Product Price</label>
                        <input type="text" name="price" placeholder="price" id="price" class="form-control" >
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-4">
                            <div>
                                <label for="trend">Trending</label>
                                <select name="trending" id="trend">
                                    <option value="">please select</option>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <label for="brandname">Brand Name</label>
                                <select name="brandname" id="brandname">
                                    <option value="">please select</option>
                                    @foreach($brand as $brands)
                                        <option value="{{$brands->name}}">{{$brands->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div>
                                <label for="topitem">Topitem</label>
                                <select name="topitem" id="topitem">
                                    <option value="">please select</option>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-4">
                            <div>
                                <label for="hotproduct">hotproduct</label>
                                <select name="hotproduct" id="hotproduct">
                                    <option value="">please select</option>
                                    <option value="yes">yes</option>
                                    <option value="no">no</option>
                                </select>
                            </div>
                        </div>

                            <div class="col-4">
                                <div>
                                    <label for="categories">Category</label>
                                    <select name="categories" id="categories">
                                        <option value="">please select</option>
                                        @foreach($category as $categories)
                                            <option value="{{$categories->name}}">{{$categories->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>


                    <div>
                        <label for="">Image 1</label>
                        <input type="file" name="file1" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="">Image 2</label>
                        <input type="file" name="file2" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="">Image 3</label>
                        <input type="file" name="file3" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="">Image 4</label>
                        <input type="file" name="file4" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="details">Product details</label>
                        <textarea name="details" id="details" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">save</button>
                </form>

            </div>

        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>
</html>

