<!-- SIDEBAR -->
<section id="sidebar">
    <a href="indexadmin" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">SMA</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="indexadmin">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="product">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Product</span>
            </a>
        </li>
        <li>
            <a href="orders">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Order</span>
            </a>
        </li>
        <li>
            <a href="message">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Message</span>
            </a>
        </li>
        <li>
            <a href="category">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Category</span>
            </a>
        </li>
        <li>
            <a href="brand">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">Brand</span>
            </a>
        </li>
        <li>
            <a href="getAllUser">
                <i class='bx bxs-doughnut-chart' ></i>
                <span class="text">User</span>
            </a>
        </li>
{{--        <li >--}}
{{--            <a href="team" >--}}
{{--                <i class='bx bxs-group' ></i>--}}
{{--                <span class="text">Team</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
    <ul class="side-menu">
{{--        <li>--}}
{{--            <a href="#">--}}
{{--                <i class='bx bxs-cog' ></i>--}}
{{--                <span class="text">Settings</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a href="#">--}}
{{--                <i class='bx bxs-cog' ></i>--}}
{{--                <span class="text">Admin Control</span>--}}
{{--            </a>--}}
{{--        </li>--}}

            <li style="margin-left: 40px">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="ti-power-off"></i><strong>Logout</strong>

                    </x-dropdown-link>
                </form>
            </li>
    </ul>
</section>
<!-- SIDEBAR -->
