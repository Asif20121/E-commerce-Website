@extends('frontend.master')
@section('mainpage')

@section('title')
My Cart Page
@endsection
<!-- <label for="cart_check">
	<section class="cart-view bg-white shadow rounded" id="cart_section">
		<div class="icon text-center">
			<span>
				
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
</label> -->

<div class="content_one" style="margin-top: 70px;">

	<div class="container">
	<div style="display: flex; margin-top:50px;"> <a href="{{ url('/')}}" style="text-decoration: none; ">@if (session()->get('language')=='bangla')
        <h1 >প্রচ্ছদ</h1>
        @else
        <h1>Home</h1>
        @endif
      </a>
      <h1>/ {{ session()->get('language')=='bangla'?  "সপিং কার্ট" : "MyCart" }}
      </h1>
    </div>
	</div><!-- /.container -->

</div>

<div class="content_one" style="min-height: 500px;">
	<div class="body-content">
		<div class="container">
			<div class="my-wishlist-page">

				<div class="shopping-cart">
					<div class="shopping-cart-table ">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="cart-romove item">Image</th>
										<th class="cart-description item">Name</th>
										<th class="cart-product-name item">Color</th>
										<th class="cart-edit item">Size</th>
										<th class="cart-qty item">Quantity</th>
										<th class="cart-sub-total item">Subtotal</th>
										<th class="cart-total last-item">Remove</th>
									</tr>
								</thead><!-- /thead -->
								<tbody id="cartPage">
								</tbody>
							</table>
						</div>
					</div>
					<div class="row ">
						<div class="col-md-4 col-sm-12 estimate-ship-tax">
						</div>
						<div class="col-md-4 col-sm-12 estimate-ship-tax">

							@if(Session::has('coupon'))

							@else
								<table class="table" id="couponField">
									<thead>
										<tr>
											<th>
												<span class="estimate-title">Discount Code</span>
												<p>Enter your coupon code if you have one..</p>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="form-group">
													<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_name">
												</div>
												<div class="clearfix pull-right">
													<button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">APPLY COUPON</button>
												</div>
											</td>
										</tr>
									</tbody><!-- /tbody -->
								</table><!-- /table -->
							@endif

						</div><!-- /.estimate-ship-tax -->
						<div class="col-md-4 col-sm-12 cart-shopping-total">
							<table class="table">
								<thead id="couponCalField">
									
								</thead><!-- /thead -->
								<tbody>
									<tr>
										<td>
											<div class="cart-checkout-btn pull-right">
												<a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
											</div>
										</td>
									</tr>
								</tbody><!-- /tbody -->
							</table><!-- /table -->
						</div><!-- /.cart-shopping-total -->
					</div>
				</div><!-- /.row -->
			</div><!-- /.sigin-in-->



			<br>

		</div>
	</div>
</div>



@endsection