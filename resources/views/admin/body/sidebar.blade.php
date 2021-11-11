@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">



        <div class="user-profile">
            <div class="ulogo">
                <a href="{{route('dashboard')}}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png')}}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{($route == 'dashboard')? 'active':''}}">
                <a href="{{route('dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">

                <a href="#">
                    <i data-feather="mail"></i> <span>Pets List</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{asset('animal_type')}}"><i class="ti-more"></i>Type</a></li>
                    <li><a href="{{asset('animal_detail')}}"><i class="ti-more"></i>All Pets</a></li>
                    <li><a href="{{asset('testimonials')}}"><i class="ti-more"></i>Testination</a></li>
                </ul>
            </li>

{{--            Shop Start--}}
            <li class="header nav-small-cap">Shop</li>

            <li class="treeview {{($prefix == '/admin')?'active':''}}">
                <a href="#">
                    <i data-feather="package"></i>
                    <span>Product</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'add.product')?'active':''}}"><a href="{{route('add.product')}}"><i class="ti-more"></i>Add Product</a></li>
                    <li class="{{($route == 'manage.product')?'active':''}}"><a href="{{route('manage.product')}}"><i class="ti-more"></i>Manage Product</a></li>
                </ul>
            </li>

            <li class="treeview {{($prefix == '/brand')?'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Brand</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'all.brand')?'active':''}}"><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brand</a></li>
                </ul>
            </li>

            <li class="treeview {{($route == 'category.index')? 'active':''}}">
                <a href="#">
                    <i data-feather="layers"></i>
                    <span>Category</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{($route == 'category.index')?'active':''}}"><a href="{{asset('admin/category')}}"><i class="ti-more"></i>All Category</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="shopping-bag"></i>
                    <span>Shop</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
{{--                    <li><a href="{{route('all.product')}}"><i class="ti-more"></i>All Product</a></li>--}}
                    <li><a href="{{asset('admin/category')}}"><i class="ti-more"></i>All Category</a></li>
                    <li><a href="{{route('all.brand')}}"><i class="ti-more"></i>All Brands</a></li>
                    <li><a href="{{asset('admin/order')}}"><i class="ti-more"></i>Order</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">Service</li>

            <li class="treeview">
                <a href="{{route('service_type.index')}}">
                    <i data-feather="credit-card"></i>
                    <span>Service Type</span>
                    <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>

                  <ul class="treeview-menu">
                      <li><a href="{{route('service_type.index')}}">View Type Service</a></li>
                      <li><a href="{{route('service_type.create')}}">Create Type Service</a></li>
                  </ul>
            </li>

            <li class="treeview">
                <a href="{{route('service.index')}}">
                    <i data-feather="credit-card"></i>
                    <span>Service</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>

                    <ul class="treeview-menu">
                        <li><a href="{{route('service.index')}}">View Service</a></li>
                        <li><a href="{{route('service.create')}}">Create Service</a></li>
                    </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Staff</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('staff.index')}}"><i class="ti-more"></i>Profile</a></li>
                    <li><a href="{{route('staff.create')}}"><i class="ti-more"></i>Create Staff</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="shopping-bag"></i>
                    <span>Order Service</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('order.index')}}"><i class="ti-more"></i>Order</a></li>
                    {{-- <li><a href="{{route('order.create')}}"><i class="ti-more"></i>Service Recycler</a></li> --}}
                </ul>
            </li>


            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                    <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                    <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                    <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                    <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">

                    <a href="{{route('service.index')}}">

                        <i data-feather="credit-card"></i>
                        <span>Service</span>
                        <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>

                    <ul class="treeview-menu">
                        <li><a href="{{route('service.index')}}">View Service</a></li>
                        <li><a href="{{route('service.create')}}">Create Service</a></li>
                    </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Staff</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('staff.index')}}"><i class="ti-more"></i>Profile</a></li>
                    <li><a href="{{route('staff.create')}}"><i class="ti-more"></i>Create Staff</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="shopping-bag"></i>
                    <span>Order Service</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                      </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('order.index')}}"><i class="ti-more"></i>Order</a></li>
                    {{-- <li><a href="{{route('order.create')}}"><i class="ti-more"></i>Service Recycler</a></li> --}}
                </ul>
            </li>

        </ul>


    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
