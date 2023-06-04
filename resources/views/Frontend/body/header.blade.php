<!--header area start-->


<header style=" position: sticky;
  top: 0;
  z-index: 999;
  ">
    <div class="content top_content">
        <div class="row">
            <div class="col d-flex justify-content-around" style="height: 50px; max-width: 250px;">
                <label for="check">
                    <i class="fas fa-bars" id="sidebar_btn"></i>
                </label>
                <a href="{{ url('/') }}"><img src="{{ asset('frontend/logopng07.png') }}" alt="" width="200px" height="50px" style="margin-right: -40px;"></a>
            </div>
            <div id="search_div" class="col justify-content-between">
                <div class="wrapper" style="width: 100%;">
                    <div class="search-input">                                                 
                            <a href="" target="_blank" hidden></a>
                        <input class="top_search" type="text" placeholder="Type to search..">
                        <div class="icon"><i class="fas fa-search"></i></div>   
                        <div class="autocom-box">
                            <!-- here list are inserted from javascript -->
                        </div>                                                                                                                
                    </div>
                </div>
            </div>
            <div id="language_div" class="col justify-content-around" style="max-width: 300px;margin-top: 10px;">
                <a href="{{ route('mycart') }}" style="text-decoration: none;color:aliceblue;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    @if (session()->get('language')=='bangla')
                    মাইকার্ট
                    @else
                    MyCart
                    @endif</a>
                <a href="{{ route('wishlist') }}" style="text-decoration: none;color:aliceblue;"><svg width="26" height="26" fill="currentColor" data-label="Wishlist" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg> @if (session()->get('language')=='bangla')
                    উইশলিষ্ট
                    @else
                    Wishlist
                    @endif</a>
                <label class="toggle">
                    <input type="checkbox" id="language_toggle" @if (session()->get('language')=='bangla')
                    checked
                    @else
                    @endif
                    >
                    <span class="slider"></span>
                    <span class="labels" data-on="বাংলা" data-off="ENG"></span>
                </label>


            </div>
            @if (Auth::check())
            <div id="signup_div" class="col  justify-content-right " style="margin-right: -12px; max-width:200px; ">
                <ul>
                    <li class="menuitem2">
                        <a href="#" id='user-profile' class="logout_btn signin_btn  dropdown" data-bs-toggle="modal2" data-bs-target="#staticBackdrop" style="font-size: 15px;padding-top: 10px; overflow:auto">
                            @php
                            $user_email= explode("@", Auth::user()->email);
                            @endphp
                            {{ $user_email[0] }}
                        </a>
                        <ul id="hidden" class="dropdown-content">
                            <li class="hover-1"><a href="{{ route('user.profile') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    প্রোফাইল
                                    @else
                                    Your Profile
                                    @endif
                                </a></li>
                            <li class="hover-1"><a href="{{ route('my.orders') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    অর্ডার
                                    @else
                                    My Orders
                                    @endif </a></li>
                            <li class="hover-1"><a href="{{ route('return.order.list') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    রিটার্ন অর্ডার
                                    @else
                                    Return Orders
                                    @endif </a></li>
                            <li class="hover-1"><a href="{{ route('cancel.orders') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    ক্যানসেল অর্ডার
                                    @else
                                    Cancel Orders
                                    @endif </a></li>
                            <li class="hover-1"><a href="{{ route('wishlist') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    উইশলিষ্ট
                                    @else
                                    Your Wishlist
                                    @endif</a></li>
                            <li class="hover-1"><a href="{{ route('mycart') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    কার্ট
                                    @else
                                    Your Cart
                                    @endif
                                </a></li>
                            <li class="hover-1"><a href="" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    পেয়মেন্ট ইতিহাস
                                    @else
                                    Payment History
                                    @endif</a></li>
                            <li class="hover-1"><a href="{{ route('user.password')}}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    পাসওয়ার্ড পরিবর্তন
                                    @else
                                    Change Password
                                    @endif</a></li>
                            <li class="hover-1"><a href="{{ route('user.logout') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                                    লগ আউট
                                    @else
                                    Log out
                                    @endif
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @else
            <div id="signup_div" class="col  justify-content-right" style="margin-right: -12px;max-width: 200px;">
                <a href="#" id='modal-launcher' class="logout_btn signin_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    @if (session()->get('language')=='bangla')
                    সাইন ইন
                    @else
                    Sign in
                    @endif
                </a>
            </div>
            @endif
            <div id="threedot_div" class="col  justify-content-end" style="margin: 22px; text-align: end;">
                <label for="threedot">
                    <i class="fa-solid fa-ellipsis-vertical fa-2xl" id="threedot_btn"></i>
                </label>
                <!-- <button id="check_three_dot"> </button> -->
                <input type="checkbox" id="check_three_dot">
            </div>
        </div>
    </div>

</header>
<div id="mini_menu" style="display: none;  z-index: 5000; position:sticky">

    <ul class="links" style="width: 100%;display: list-item; border-left-style:none;">
        <li style="background: #4f4f4f;color: #fff; width: 100%;
     border-left-style:none;"><span>FM SHOP</span></li>
        @if (Auth::check())
        <li class="hover-1"><a href="{{ route('user.profile') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                প্রোফাইল
                @else
                Your Profile
                @endif
            </a></li>
        <li class="hover-1"><a href="{{ route('my.orders') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                অর্ডার
                @else
                My Orders
                @endif </a></li>
        <li class="hover-1"><a href="{{ route('return.order.list') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                রিটার্ন অর্ডার
                @else
                Return Orders
                @endif </a></li>
        <li class="hover-1"><a href="{{ route('cancel.orders') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                ক্যানসেল অর্ডার
                @else
                Cancel Orders
                @endif </a></li>
        <li class="hover-1"><a href="{{ route('wishlist') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                উইশলিষ্ট
                @else
                Your Wishlist
                @endif</a></li>
        <li class="hover-1"><a href="{{ route('mycart') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                কার্ট
                @else
                Your Cart
                @endif
            </a></li>
        <li class="hover-1"><a href="" class="user_menu_item">@if (session()->get('language')=='bangla')
                পেয়মেন্ট ইতিহাস
                @else
                Payment History
                @endif</a></li>
        <li class="hover-1"><a href="{{ route('user.password')}}" class="user_menu_item">@if (session()->get('language')=='bangla')
                পাসওয়ার্ড পরিবর্তন
                @else
                Change Password
                @endif</a></li>
        <li class="hover-1"><a href="{{ route('user.logout') }}" class="user_menu_item">@if (session()->get('language')=='bangla')
                লগ আউট
                @else
                Log out
                @endif
            </a></li>

        @else
        <li>
            <a href="{{route('login')}}" style="text-decoration: none; color: rgb(0, 0, 0);">
                <span class="three_dot_menu_item">
                    @if (session()->get('language')=='bangla')
                    সাইন ইন
                    @else
                    Sign in
                    @endif

                </span>
            </a>
        </li>

        <li><span id="Language_value">
                @if (session()->get('language')=='bangla')
                ভাষা:&nbsp;&nbsp;
                @else
                Language:&nbsp;&nbsp;
                @endif

            </span>
            <label class="toggle">
                <input type="checkbox" id="language_toggle_two" @if (session()->get('language')=='bangla')
                checked
                @else

                @endif
                >
                <span class="slider"></span>
                <span class="labels" data-on="বাংলা" data-off="ENG"></span>
            </label>
        </li>
        <li>

            <form method="post" action="" style="align-items: center;">
                @csrf
                <input type="search" @if (session()->get('language')=='bangla')
                placeholder="পণ্য খুঁজুন (যেমন: হলুদ, মরিচ, জিরা)"
                @else
                placeholder="Search for products (e.g. eggs, milk, potato)"
                @endif


                style="width: 100%;">
                <button type="button" class="btn btn-primary" style="width: 100%; margin-top: 20px;">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </li>
        @endif
    </ul>
</div>
<!--header area end-->