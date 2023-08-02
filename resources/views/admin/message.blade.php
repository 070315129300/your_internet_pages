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
                        <a class="active" href="#">Message</a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>All Messages</h3>
                    <i class='bx bx-search' ></i>
                    <i class='bx bx-filter' ></i>
                </div>
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($message as $messages)
                        <tr>
                            <td>{{$messages->name}}</td>
                            <td>{{$messages->email}}</td>
                            <td>{{$messages->phone}}</td>
                            <td>{{$messages->message}}</td>
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

