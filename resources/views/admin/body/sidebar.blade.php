@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

{{-- linear-gradient(45deg, #0ff769, #7a15f7) --}}
{{-- linear-gradient(45deg, #0ff769, #1544f7) --}}

{{-- @push('css') --}}
    <style>
        .theme-primary.dark-skin .sidebar-menu > li.active {
            background: linear-gradient(45deg, #0ff769, #1544f7);
            /* color: white; */
            -webkit-box-shadow: 0px 0px 12px 0px #0ff769;
            box-shadow: 0px 0px 12px 0px #1544f7;
        }
        .theme-primary.dark-skin .sidebar-menu > li.active.treeview.treeview > a {
            background: linear-gradient(45deg, #0ff769, #1544f7);
        }
        
    </style>
{{-- @endpush --}}

<aside class="main-sidebar" style="background-color: #1B9C85">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ url('admin/dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img style="height: 30px; width:40px;" src="{{ asset('backend/images/icon.ico') }}" alt="">
                        <h3 style="color: white"><b>FM</b> Daily shop</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree" style="background-color: #98EECC">

            
            <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart" style="color: black;"></i>
                    <span class="head-text">Dashboard</span>
                </a>
            </li>




            <li class="treeview {{ ($prefix == '/brand') ? 'active' : '' }}">
                <a href="#">
                    <img width="20" height="20" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-brand-public-relations-agency-flaticons-lineal-color-flat-icons.png" alt="external-brand-public-relations-agency-flaticons-lineal-color-flat-icons"/>
                    <span class="head-text"> Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.brand') ? 'active' : '' }}"><a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brand</a></li>
                </ul>
            </li>




            <li class="treeview {{ ($prefix == '/category') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="mail"></i>  --}}
                    <img width="20" height="20" src="https://img.icons8.com/dusk/64/diversity.png" alt="diversity"/>
                    <span class="head-text">Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" > 
                    <li class="{{ ($route == 'all.category') ? 'active' : '' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>All Cetegory</a></li>
                    <li class="{{ ($route == 'all.subcategory') ? 'active' : '' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCetegory</a></li>
                    <li class="{{ ($route == 'all.subsubcategory') ? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub->SubCetegory</a></li>
                </ul>
            </li>



            <li class="treeview {{ ($prefix == '/product') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/nolan/64/product.png" alt="product"/>
                    <span class="head-text">Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'add-product') ? 'active' : '' }}"><a href="{{ route('add-product') }}"><i class="ti-more"></i>Add Products</a></li>
                    <li class="{{ ($route == 'manage-product') ? 'active' : '' }}"><a href="{{ route('manage-product') }}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>



            <li class="treeview {{ ($prefix == '/slider') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/external-window-furniture-kiranshastry-gradient-kiranshastry.png" alt="external-window-furniture-kiranshastry-gradient-kiranshastry"/>
                    <span class="head-text">Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-slider') ? 'active' : '' }}"><a href="{{ route('manage-slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
                </ul>
            </li>




            <li class="treeview {{ ($prefix == '/coupons') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/external-wanicon-flat-wanicon/64/external-coupon-cyber-monday-wanicon-flat-wanicon.png" alt="external-coupon-cyber-monday-wanicon-flat-wanicon"/>
                    <span class="head-text">Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-coupon') ? 'active' : '' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupons</a></li>
                </ul>
            </li>



            <li class="treeview {{ ($prefix == '/shipping') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/color/48/in-transit--v1.png" alt="in-transit--v1"/>
                    <span class="head-text">Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'manage-division') ? 'active' : '' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a></li>
                    <li class="{{ ($route == 'manage-district') ? 'active' : '' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a></li>
                    <li class="{{ ($route == 'manage-upazila') ? 'active' : '' }}"><a href="{{ route('manage-upazila') }}"><i class="ti-more"></i>Ship Upazila</a></li>
                </ul>
            </li>



            {{-- <li class="treeview {{ ($prefix == '/blog') ? 'active' : '' }}">
                <a href="#">
                    <img width="20" height="20" src="https://img.icons8.com/nolan/64/google-blog-search.png" alt="google-blog-search"/>
                    <span class="head-text">Manage Blog</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'blog.category') ? 'active' : '' }}"><a href="{{ route('blog.category') }}"><i class="ti-more"></i>Blog Category</a></li>
                    <li class="{{ ($route == 'list.post') ? 'active' : '' }}"><a href="{{ route('list.post') }}"><i class="ti-more"></i>List Blog Post</a></li>
                    <li class="{{ ($route == 'add.post') ? 'active' : '' }}"><a href="{{ route('add.post') }}"><i class="ti-more"></i>Add Blog Post</a></li>
                </ul>
            </li> --}}



            <li class="treeview {{ ($prefix == '/setting') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/nolan/64/gear.png" alt="gear"/>
                    <span class="head-text">Manage Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'site.setting') ? 'active' : '' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>Site Setting</a></li>
                    {{-- <li class="{{ ($route == 'seo.setting') ? 'active' : '' }}"><a href="{{ route('seo.setting') }}"><i class="ti-more"></i>Seo Setting</a></li> --}}
                </ul>
            </li>




            <li class="treeview {{ ($prefix == '/return') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/nolan/64/return.png" alt="return"/>
                    <span class="head-text">Return Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'return.request') ? 'active' : '' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>
                    <li class="{{ ($route == 'all.request') ? 'active' : '' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>
                </ul>
            </li>




            <li class="header nav-small-cap head-text">User Interface</li>

            <li class="treeview {{ ($prefix == '/orders') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/external-itim2101-blue-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101"/>
                    <span class="head-text">Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'prnding-orders') ? 'active' : '' }}"><a href="{{ route('prnding-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                    <li class="{{ ($route == 'confirmed-orders') ? 'active' : '' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
                    <li class="{{ ($route == 'processing-orders') ? 'active' : '' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
                    <li class="{{ ($route == 'picked-orders') ? 'active' : '' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i>Picked Orders</a></li>
                    <li class="{{ ($route == 'shipped-orders') ? 'active' : '' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i>Shipped Orders</a></li>
                    <li class="{{ ($route == 'delivered-orders') ? 'active' : '' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                    <li class="{{ ($route == 'cancel-orders') ? 'active' : '' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i>Cancel Orders</a></li>
                </ul>
            </li>



            <li class="treeview {{ ($prefix == '/stock') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/color/48/business-report.png" alt="business-report"/>
                    <span class="head-text">Manage Stock</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'product.stock') ? 'active' : '' }}"><a href="{{ route('product.stock') }}"><i class="ti-more"></i>Product Stock</a></li>
                </ul>
            </li>



            <li class="treeview {{ ($prefix == '/reports') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/color/48/business-report.png" alt="business-report"/>
                    <span class="head-text">All Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-reports') ? 'active' : '' }}"><a href="{{ route('all-reports') }}"><i class="ti-more"></i>All Reports</a></li>
                </ul>
            </li>



            <li class="treeview {{ ($prefix == '/alluser') ? 'active' : '' }}">
                <a href="#">
                    {{-- <i data-feather="file"></i> --}}
                    <img width="20" height="20" src="https://img.icons8.com/neon/96/user.png" alt="user"/>
                    <span class="head-text">All Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all-users') ? 'active' : '' }}"><a href="{{ route('all-users') }}"><i class="ti-more"></i>All Users</a></li>
                </ul>
            </li>


            
        </ul>
    </section>

    {{-- <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div> --}}
</aside>
