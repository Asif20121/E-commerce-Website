@extends('frontend.master')
@section('mainpage')
@section('title')
Special Deal
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
    <div style="display: flex; margin-top: 50px;"> <a href="{{ url('/')}}" style="text-decoration: none;">@if (session()->get('language')=='bangla')
        <h1>প্রচ্ছদ</h1>
        @else
       <h1>Home</h1> 
        @endif </a>
         <h1>/ {{ session()->get('language')=='bangla'? "স্পেশাল ডিল" : "Special Deal"}}</h1> 
    </div> 
    <!-- <h1 style="background: black; color:red; text-align:center;padding: 20px;border-radius: 37px; ">Hot Deal</h1> -->
    <div class="row" style=" border: 1px solid #eee; margin-top: 25px">
      @foreach ($product as $product)
      <!-- <div class="mb-3"> -->
        <div class="card m-1" style=" position: initial;max-width: 250px;">
          <div class="card-body" >
            <img src="{{ URL::to('storage/products/thambnail', $product->product_thambnail) }}" alt="" style="text-align:center; margin: auto;    display: block;">
            <a href="{{ url('product/details/'.$product->id)}}"></a>
            <h5 class="card-title" style="min-height:125px; text-align:center;">{{ session()->get('language')=='bangla'? Illuminate\Support\Str::limit($product->product_name_bn,50): Illuminate\Support\Str::limit($product->product_name_en,50)  }}</h5>  
            <p class="card-text" style="text-align:center;">Only {{ $product->product_qty}} left!</p>
            <p class="card-text" style="text-align:center;">
              <span style="color: red;">৳&nbsp;{{$product->discount_price}} </span> <span style="text-decoration: line-through;">৳&nbsp;{{$product->selling_price}} </span>
            </p>

            <div class="btn-group cart_group" style="display: flex;">
              <button class="btn btn-danger cart_button" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"><i class="fa-sharp fa-solid fa-heart"></i></button>
              @php($flag = "NotFound")
              @foreach ($carts as $key => $value)
              @if ($value->name == $product->product_name_en && $value->qty>0 )
              <div id="{{ $product->id }}" class="btn-group cart_group" style="display: flex; display:contents">
                <button type="submit" class="btn btn-warning btn-sm cart_decrease" id="{{ $value->rowId }}" onclick="cartDecrement(this.id)">-</button>
                <input type="text" value="{{ $value->qty }}" min="1" max="100" disabled="" style="width:25px;">
                <button type="submit" class="btn btn-success btn-sm cart_increase" id="{{ $value->rowId }}"  onclick="cartIncrement(this.id)">+</button>

              </div>
              @php($flag = "found")
              @break
              @endif
              @endforeach

              @if ($flag == "NotFound")
              <div  id="{{ $product->id }}" class="btn-group cart_group" style="display: flex; display:contents">
              <button type="button" class="btn btn-danger add_cart" title="Add Cart"  id="{{ $product->id }}" onclick="add_product_to_cart(this.id)">
                ADD TO CART
              </button>
              </div>
              @endif

              <div class="btn-group cart_group" style="display: flex; display:none"></div>
              <button class="btn btn-danger cart_button"  id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#pdoductDetailModal" onclick="show_product_detail(this.id)"><i class="fa-solid fa-eye"></i></button>
            </div>
          </div>
        </div>
      <!-- </div> -->
      @endforeach
    </div>
    </div>
</div>
@include('frontend.body.cartbar')
@endsection