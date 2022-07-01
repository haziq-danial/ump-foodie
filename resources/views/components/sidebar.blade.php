<!-- Main Sidebar Container -->
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('../img/01-Logo UMP_Full Color.png') }}" class="img-size-32 elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">FOODIE</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @can('manage restaurant')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Manage Restaurants
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-restaurant.all') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Restaurants</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                
                @can('manage order')
                
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>
                                Cart
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-cart.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Cart</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('manage delivery')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-truck-loading"></i>
                            <p>
                                Manage Deliveries
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-delivery.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Deliveries</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-delivery.my-deliveries')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>My Deliveries</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-delivery.previous') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Previous Deliveries</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('manage order')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Manage Order
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-order.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Make Order</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-order.upcoming') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Upcoming Orders</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-order.previous') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Completed Orders</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('manage complaint')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Manage Complaints
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('manage-complaint.rider-view')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                
                <li class="nav-item">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
