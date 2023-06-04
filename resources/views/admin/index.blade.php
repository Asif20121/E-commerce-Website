@extends('admin.admin_master')
@section('admin')


    <style>
        .dashboard_icon{
            margin-left: 50px; 
        }

        .dashboard_name{
            margin-top: -12px;
            margin-left:20px;
        }

        .number_count{
            margin-right: 10px;
            margin-top: -20px;
        }

        .book {
            position: relative;
            border-radius: 10px;
            width: 400px;
            height: 150px;
            margin-top:70px; 
            margin-left:130px; 
            margin-bottom:30px; 
            background-color: whitesmoke;
            -webkit-box-shadow: 1px 1px 12px #000;
            box-shadow: 1px 1px 12px #000;
            -webkit-transform: preserve-3d;
            -ms-transform: preserve-3d;
            transform: preserve-3d;
            -webkit-perspective: 2000px;
            perspective: 2000px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            color: #000;
            }

            .cover {
            top: 0;
            position: absolute;
            background-color: lightgray;
            width: 100%;
            height: 100%;
            border-radius: 10px;
            cursor: pointer;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
            -webkit-transform-origin: 0;
            -ms-transform-origin: 0;
            transform-origin: 0;
            /* -webkit-box-shadow: 1px 1px 12px #000; */
            /* box-shadow: 1px 1px 12px #000; */
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            }

            .book:hover .cover {
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
            -webkit-transform: rotatey(-80deg);
            -ms-transform: rotatey(-80deg);
            transform: rotatey(-80deg);
            }

            p {
            font-size: 20px;
            font-weight: bolder;
        }
        
    </style>

    @push('css')
        {{-- Date Search By Range Report CSS --}}
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @endpush




    @php
        $date = date('d-m-y');
        $today = App\Models\Order::where('order_date', $date)->sum('amount');

        $month = date('F');
        $month = App\Models\Order::where('order_month', $month)->sum('amount');
        
        $year = date('Y');
        $year = App\Models\Order::where('order_year', $year)->sum('amount'); 
    @endphp





    <div class="container-full">
        
        <h3 class="text-dark"><b>Admin Dashboard </b></h3>

        <div class="col-md-12">
            <div style="margin-top: -30px; float:right;">
                <form class="col-xl-3 col-6 mb-4" method="post" action="{{ route('search-by-report') }}">
                    @csrf
                    <label for="" class="text-dark"><b>Shearch By Report</b>
                        <span class="input-group-text border-0" id="search-addon" style="background-color: #FFF8D6; ">
                            <div><i class="fa fa-calendar"></i>&nbsp;
                                <input id="reportrange" name="date" value="" autocomplete="off" />
                                <input id="search_date" type="submit" class="btn btn-info btn-sm float-right" style="display: none;">
                                <label for="search_date" style="margin-left: 10px;"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </label>
                            </div>
                        </span>
                    </label>
                </form>
            </div>

            <div class="d-flex justify-content-left">

                <div class="col-md-4" style="margin-left: -110px;">
                    <div class="book bg-dark" style="width: 200px;">
                        <p>{{ $today }} &nbsp;&nbsp;টাকা</p>
                        <div class="cover" style="background-color: #DDFFBB">
                            <p style="color:#000">Today Sale</p>
                        </div>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <div class="col-md-4" style="margin-left: 90px;">
                    <div class="book bg-dark" style="width: 200px;">
                        <p>{{ $month }} &nbsp;টাকা</p>
                        <div class="cover" style="background-color: #D5B4B4">
                            <p style="color:#000">Monthly Sale</p>
                        </div>
                    </div>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <div class="col-md-4" style="margin-left: 90px;">
                    <div class="book bg-dark" style="width: 200px;">
                        <p>{{ $year }} &nbsp;&nbsp;টাকা</p>
                        <div class="cover" style="background-color: #DDFFBB">
                            <p style="color:#000">Yearly Sale</p>
                        </div>
                    </div>
                </div>
                
                {{-- <div class="book bg-dark" style="width: 200px;">
                    <p>50000 &nbsp;&nbsp;টাকা</p>
                    <div class="cover" style="background-color: C4DFDF">
                        <p>Today Sales Amount</p>
                    </div>
                </div>

                <div class="book bg-dark">
                    <p>50000 &nbsp;টাকা</p>
                    <div class="cover" style="background-color: #FFF8D6">
                        <p>Monthly Sales Amount</p>
                    </div>
                </div>

                <div class="book bg-dark">
                    <p>50000 &nbsp;&nbsp;টাকা</p>
                    <div class="cover" style="background-color: C4DFDF">
                        <p>Yearly Sales Amount</p>
                    </div>
                </div> --}}
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 my-5">
                {{-- <h4>Dashboard</h4> --}}
                <div class="row mt-4">
                    <!-- Total News (News) Card Example -->
                    
                        <div class="col-xl-3 col-6 mb-4">
                            <a href="{{ route('all.brand') }}">
                                <div class="card border-left-success shadow h-100 py-2" style="background-color: #00FF7F">
                                    <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-brand-public-relations-agency-flaticons-lineal-color-flat-icons.png" alt="external-brand-public-relations-agency-flaticons-lineal-color-flat-icons"/>
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2 dashboard_name">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1 " style="color: #ffffff;">Brands</div>
                                            </div>
                                            <div class="col-auto number_count">
                                                {{-- <i class="bi bi-newspaper"></i> --}}
                                            <h4><span class="badge badge-pill badge-light">{{ count($brands) }}</span></h4>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <!-- Panding News (Pending News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('all.category') }}">
                            <div class="card border-left-success shadow h-100 py-2" style="background-color: #FC2947">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/dusk/64/diversity.png" alt="diversity"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#ffffff;">Category</div>
                                        </div>
                                        <div class="col-auto number_count">
                                            {{-- <i class="bi bi-file-break"></i> --}}
                                            <h4><span class="badge badge-pill badge-light">{{ count($category) }}</span></h4>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Daily News (Daily News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('all.subcategory') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #FFEA20">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/dusk/64/diversity.png" alt="diversity"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #ffffff">Sub-Category </div>
                                        </div>
                                        <div class="col-auto number_count">
                                            {{-- <i class="bi bi-paperclip"></i> --}}
                                            <h4><span class="badge badge-pill badge-light" >{{ count($sub_category) }}</span></h4>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Monthly News (Monthly News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('all.subsubcategory') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #00FFFF">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/dusk/64/diversity.png" alt="diversity"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:rgb(255, 255, 255);"> Sub->Sub-Category </div>
                                        </div>
                                        <div class="col-auto number_count">
                                            {{-- <i class="bi bi-bounding-box"></i> --}}
                                            <h4><span class="badge badge-pill badge-light" >{{ count($sub_sub_category) }}</span></h4>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <!-- Photo News (Photo News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('manage-product') }}">
                            <div class="card border-left-success shadow h-100 py-2" style="background-color: #9BA4B5">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/nolan/64/product.png" alt="product"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #ffffff">Products</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($product) }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Photo News (Photo News Pending) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('manage-slider') }}">
                            <div class="card border-left-success shadow h-100 py-2" style="background-color: #00FF7F">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-kiranshastry-gradient-kiranshastry/64/external-window-furniture-kiranshastry-gradient-kiranshastry.png" alt="external-window-furniture-kiranshastry-gradient-kiranshastry"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #ffffff">Slider</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($slider) }}</span></h4>
                                            {{-- <i class="bi bi-aspect-ratio"></i> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Video News (Video News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('manage-coupon') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #00FFFF">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-wanicon-flat-wanicon/64/external-coupon-cyber-monday-wanicon-flat-wanicon.png" alt="external-coupon-cyber-monday-wanicon-flat-wanicon"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#ffffff;">Coupons</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($coupon) }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                        <!-- Video (Video News Pending) Card Example -->
                        <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('return.request') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #9BA4B5">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/nolan/64/return.png" alt="return"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#ffffff;">Return Order</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($return_order) }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('prnding-orders') }}">
                            <div class="card border-left-success shadow h-100 py-2" style="background-color: #00FF7F">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-itim2101-blue-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #ffffff">Prnding Orders</div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($pending_order) }}</span></h4>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Panding News (Pending News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('confirmed-orders') }}">
                            <div class="card border-left-success shadow h-100 py-2" style="background-color: #FC2947">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-itim2101-blue-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#ffffff;">Confirmed Orders</div>
                                        </div>
                                        <div class="col-auto number_count">
                                            {{-- <i class="bi bi-file-break"></i> --}}
                                            <h4><span class="badge badge-pill badge-light" >{{ count($confirmed_order) }}</span></h4>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Daily News (Daily News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('processing-orders') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #FDFF00">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-itim2101-blue-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #ffffff">Processing Orders</div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($processing_order) }}</span></h4>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Monthly News (Monthly News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('picked-orders') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #00FFFF">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-itim2101-blue-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:rgba(255, 255, 255, 0.878);">Picked Orders</div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($picked_order) }}</span></h4>
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Photo News (Photo News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('shipped-orders') }}">
                            <div class="card border-left-success shadow h-100 py-2" style="background-color: #9BA4B5">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-itim2101-blue-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #ffffff">Shipped Orders</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($shipped_order) }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Photo News (Photo News Pending) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('delivered-orders') }}">
                            <div class="card border-left-success shadow h-100 py-2" style="background-color: #00FF7F">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/external-itim2101-blue-itim2101/64/external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101.png" alt="external-delivery-box-shopping-and-ecommerce-itim2101-blue-itim2101"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: #ffffff">Delivered Orders</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($delivered_order) }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Video News (Video News) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('cancel-orders') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #00FFFF">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/fluency/48/delete-sign.png" alt="delete-sign"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#ffffff;">Cancel Orders</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($cancel_order) }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Video (Video News Pending) Card Example -->
                    <div class="col-xl-3 col-6 mb-4">
                        <a href="{{ route('all-users') }}">
                            <div class="card border-left-info shadow h-100 py-2" style="background-color: #9BA4B5">
                                <img class="dashboard_icon" width="30" height="30" src="https://img.icons8.com/neon/96/user.png" alt="user"/>
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2 dashboard_name">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#ffffff;">All Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                        </div>
                                        <div class="col-auto number_count">
                                            <h4><span class="badge badge-pill badge-light" >{{ count($user) }}</span></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                
                <style>
                    .canvasjs-chart-tooltip {
                        position: fixed !important;
                    }
                </style>

                <div class="row">
                    <div class="col-md-12">
                        <div class="product-index" align="right" style="margin-top:40px;">
                            <div class="float-start" id="chartContainer" style="height: 400px; width: 100%;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@push('js')

    {{-- Date Search By Range Report CDN JS --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>

    {{-- Date Search By Range Report JS --}}
    <script type="text/javascript">
        $(function() {
        
            var start = moment().subtract(29, 'days');
            var end = moment();
        
            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
        
            cb(start, end);
        
        });
    </script>


@endpush