@extends('frontend.master')
@section('mainpage')
@section('title')
All the brand in the world
@endsection

<label for="cart_check" style="z-index: 10;position: fixed;display: block;">
    <section class="cart-view bg-white shadow rounded" id="cart_section">
        <div class="icon text-center">
            <span>
                <!-- <i class="fas fa-shopping-cart fa-2x"></i> -->
                <img src="{{ asset('frontend/logopng05.png') }}" alt="" width="60px">
            </span>
        </div>
        <div class="text-center text-dark font-weight-bold" id="total_items_div" style="background-color: red;">
            <span style="color: white;" id="cartQty">0</span>
            <span style="color: white;">
                @if (session()->get('language')=='bangla')
                পন্য
                @else
                Items
                @endif
            </span>
        </div>
        <div class="text-center text-dark font-weight-bold">
            <span class="total-price">
                <span class="sign">৳</span>
                <span class="value" id="cartSubTotal">0</span>
            </span>
        </div>
    </section>
</label>

<div class="content_one" style="min-height: 1000px;">
    <div class="container">
        <div style="display: flex; margin-top:50px;"> <a href="{{ url('/')}}" style="text-decoration: none; ">@if (session()->get('language')=='bangla')
                <h1>প্রচ্ছদ</h1>
                @else
                <h1>Home</h1>
                @endif
            </a>
            <h1>/ {{ session()->get('language')=='bangla'? 'ব্র্যান্ড': 'ALL Brand' }}
            </h1>
        </div>

        <!-- <h1 style="background: black; color:red; text-align:center;padding: 20px;border-radius: 37px; ">Hot Deal</h1> -->
        <div class="row" style=" border: 1px solid #eee; margin-top: 25px">
            @foreach ($brands as $brand)
            <!-- <div class="col-md mb-3"> -->
                <a href="{{ route('productPage.single.brand',$brand->id )}}" style="position: initial;max-width: 250px;text-decoration: none;padding:10px">
                    <div class="card" style="position: initial;">
                        <div class="card-body" style="min-height: 300px;min-width:200px">
                            <img src="{{ URL::to('storage/brand', $brand->brand_image) }}" alt=""  style="text-align:center;width: 100%; height: 100%; margin: auto;display: block;">

                            <h5 class="card-title" style="min-height:50px; text-align:center;">{{ session()->get('language')=='bangla'? $brand->brand_name_bn: $brand->brand_name_en  }}</h5>
                        </div>
                    </div>
                </a>
            <!-- </div> -->
            @endforeach
        </div>
    </div>
</div>
@include('frontend.body.cartbar')

@endsection