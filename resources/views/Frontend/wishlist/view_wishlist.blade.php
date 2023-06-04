@extends('frontend.master')
@section('mainpage')

@section('title')
 Wish List Page 
@endsection
<label for="cart_check">
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
        <span class="total-price"> <span class="sign">৳</span>
                <span class="value" id="cartSubTotal">0</span> </span>
        </div>
    </section>
</label>
<div class="content_one" style="margin-top: 70px;">

	<div class="container">
	<div style="display: flex; margin-top:50px;"> <a href="{{ url('/')}}" style="text-decoration: none; ">@if (session()->get('language')=='bangla')
        <h1 >প্রচ্ছদ</h1>
        @else
        <h1>Home</h1>
        @endif
      </a>
      <h1>/ {{ session()->get('language')=='bangla'?  "উইশলিষ্ট" : "Wishlist" }}
      </h1>
    </div>
	</div><!-- /.container -->

</div>

<div class="content_one" style="min-height: 700px;">
<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody id="wishlist">
				
				 
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>

</div>
</div>
</div>


@include('frontend.body.cartbar')
@endsection
