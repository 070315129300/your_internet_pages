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
                        <a class="active" href="">Category</a>
                    </li>

                </ul>
            </div>
            <li style="text-align: right">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    AddCategory
                </button>
            </li>

            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form Start -->
                            <form id="modalForm" action="createCategory" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="inputName" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label">available</label>
                                    <input type="text" class="form-control" id="inputEmail" name="status" required>
                                </div>
                                <!-- Add other form fields as needed -->

                                <!-- Add any hidden fields or tokens required for security -->

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <!-- Form End -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>All Category</h3>

                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            x
                        </button>

                        {{session()->get('message')}}
                    </div>
                @endif
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $categories)
                    <tr>
                        <td>{{$categories->name}}</td>
                        <td><span class="status completed">{{$categories->available}}</span></td>
                        <td><span class="status pending" data-bs-toggle="modal" data-bs-target="#staticBackdropedit">edit</span></td>
                        <td><a class="btn btn-danger" onclick="return confirm('are you sure you want to delete this category')" href="{{url('deleteCat', $categories->id)}}">Delete</a></td>

                    </tr>
                    @endforeach

                    <div class="modal fade" id="staticBackdropedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form Start -->
                                    <form id="modalForm" action="editCategory/{{$categories->id}}" method="post" enctype="multipart/form-data">

                                        @csrf

                                        <div class="mb-3">
                                            <label for="inputName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="inputName" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail" class="form-label">available</label>
                                            <input type="text" class="form-control" id="inputEmail" name="status" required>
                                        </div>
                                        <!-- Add other form fields as needed -->

                                        <!-- Add any hidden fields or tokens required for security -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    <!-- Form End -->
                                </div>
                            </div>
                        </div>
                    </div>

                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js
"></script>
@include('admin.footer')

