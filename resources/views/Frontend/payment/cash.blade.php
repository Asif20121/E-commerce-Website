@extends('frontend.master')
@section('mainpage')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	@section('title')
	Cash On Delivery
	@endsection




	<div class="content_one">

	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li style="margin-top: 70px;"><a href="{{ url('/')}}">Home</a> / Cash On Delivery</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->

	<div class="body-content">
			<div class="container">
				<div class="checkout-box ">
					<div class="row">


						<div class="col-md-5">
							<!-- checkout-progress-sidebar -->
							<div class="checkout-progress-sidebar ">
								<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="unicase-checkout-title">Your Shopping Amount </h4>
										</div>
										<div class="">
											<ul class="nav nav-checkout-progress list-unstyled">
												
												<hr>
												<br>

												<li style="border-left-style: none;">
													@if(Session::has('coupon'))
														<hr>
														<strong>SubTotal: </strong> ${{ $cartTotal }} 
														<hr>

														<strong>Coupon Name : </strong> {{ session()->get('coupon')['coupon_name'] }}
														( {{ session()->get('coupon')['coupon_discount'] }} % )
														<hr>

														<strong>Coupon Discount : </strong> ${{ session()->get('coupon')['discount_amount'] }} 
														<hr>

														<strong>Grand Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
														<hr>

													@else

														<strong>SubTotal: </strong> ${{ $cartTotal }} <hr>
														<strong>Grand Total : </strong> ${{ $cartTotal }} <hr>

													@endif 
												</li>
											</ul>		
										</div>
									</div>
								</div>
							</div> 
							<!-- checkout-progress-sidebar -->
                        </div> <!--end col md 5 -->
                            
                        <div class="col-md-7"> 
                            <!-- checkout-progress-sidebar -->
							<div class="checkout-progress-sidebar">
								<div class="panel-group">
									<div class="panel panel-default">

										<div class="panel-heading">
											<h4 class="unicase-checkout-title">Select Payment Method</h4>
										</div>

                                        <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                            @csrf

                                            <div class="form-row">

												<img src="{{ asset('frontend/assets/images/payments/payments_logo/3.jpg') }}" style="height: 300px; width: 500px; margin-left: 100px;" alt="">

                                                <label for="card-element">
                                                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                                    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                                    <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                                    <input type="hidden" name="gender" value="{{ $data['gender'] }}">
                                                    <input type="hidden" name="date_of_birth" value="{{ $data['date_of_birth'] }}">
                                                    <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                                    <input type="hidden" name="upazila_id" value="{{ $data['upazila_id'] }}">
                                                    <input type="hidden" name="address" value="{{ $data['address'] }}">
                                                </label>
                                            </div>
                                            <br>
                                            <button class="btn btn-primary">Submit Payment</button>

                                        </form>


									</div>
								</div>
							</div> 
							<!-- checkout-progress-sidebar -->	
						</div><!--end col md 7 -->

					</div><!-- /.row -->
				</div><!-- /.checkout-box -->
			</div><!-- /.container -->
		</div>
	</div><!-- /.body-content -->


@endsection
