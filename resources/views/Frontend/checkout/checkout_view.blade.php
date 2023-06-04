@extends('frontend.master')
@section('mainpage')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	@section('title')
	My Checkout
	@endsection

	<div class="content_one">

	<div class="breadcrumb">
		<div class="container">
			<div class="breadcrumb-inner">
				<ul class="list-inline list-unstyled">
					<li style="margin-top: 70px;"><a href="{{ url('/')}}">Home</a> / Checkout</li>
				</ul>
			</div><!-- /.breadcrumb-inner -->
		</div><!-- /.container -->
	</div><!-- /.breadcrumb -->

	<div class="body-content">
			<div class="container">
				<div class="checkout-box ">
					<div class="row">
						<div class="col-md-8">
							<div class="panel-group checkout-steps" id="accordion">
								<!-- checkout-step-01  -->
								<div class="panel panel-default checkout-step-01">
								
									<div id="collapseOne" class="panel-collapse in">
								
										<!-- panel-body  -->
										<div class="panel-body">
											<div class="row">		
								
												<!-- guest-login -->			
												<div class="col-md-6 col-sm-6 already-registered-login">
													<h4 class="checkout-subtitle" style="color: red;"><b>Shipping Address</b></h4>

													<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
														@csrf

														<div class="form-group mt-2">
															<label class="info-title checkout-subtitle" for="exampleInputEmail1"><b>Shipping Name</b><span>*</span></label>
															<input type="text" name="shipping_name" class="form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
														</div> <!-- // end form group -->

														<div class="form-group mt-3">
															<label class="info-title checkout-subtitle" for="exampleInputEmail1"><b>Email</b><span></span></label>
															<input type="email" name="shipping_email" class="form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
														</div> <!-- // end form group -->

														<div class="form-group mt-3">
															<label class="info-title checkout-subtitle" for="exampleInputEmail1"><b>Phone</b></label>
															<input type="number" name="shipping_phone" class="form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
														</div> <!-- // end form group -->

														<div class="form-group mt-3">
															<label class="labelClass checkout-subtitle"><b>Gender</b></label>
															<select class="selectClass form-control" name="gender">
																<option value="Choose">--Select Gender--</option>
																<option value="Male">Male</option>
																<option value="Female">Female</option>
																<option value="Others">Others</option>
															</select>
														</div> <!-- // end form group -->
														
														<div class="form-group mt-3">
															<div class="inputContainer checkout-subtitle">
																<label for=""><b>Date of Birth</b></label>
																<input type="date" name="date_of_birth" class="form-control" value="{{ Auth::user()->date_of_birth }}" style="color:black;">
															</div>
														</div> <!-- // end form group -->
														

												</div>	
												<!-- guest-login -->
								
												<!-- already-registered-login -->
												<div class="col-md-6 col-sm-6 already-registered-login">

													<div class="form-group mt-4">
														<div class="controls">
															<h4 class="checkout-subtitle"><b>Division Select</b><span class="text-danger">*</span></h4>
															<select name="division_id" class="form-control" required="">
																<option value="" selected disabled="">Select Division</option>
																@foreach($divisions as $item)
																	<option value="{{ $item->id }}">{{ $item->division_name }}</option>
																@endforeach
															</select>
															@error ('division_id')
																<span class="text-danger">{{ $message }}</span>
															@enderror    
														</div>
													</div> <!-- // end form group -->


													<div class="form-group mt-3">
														<div class="controls">
															<h4 class="checkout-subtitle" ><b>District Select</b><span class="text-danger">*</span></h4>
															<select name="district_id" class="form-control" required="">
																<option value="" selected disabled="">Select District</option>
																
															</select>
															@error ('district_id')
																<span class="text-danger">{{ $message }}</span>
															@enderror    
														</div>
													</div> <!-- // end form group -->


													<div class="form-group mt-3">
														<div class="controls">
															<h4 class="checkout-subtitle"><b>Upazila Select</b><span class="text-danger">*</span></h4>
															<select name="upazila_id" class="form-control" required="">
																<option value="" selected disabled="">Select Upazila</option>
																
															</select>
															@error ('upazila_id')
																<span class="text-danger">{{ $message }}</span>
															@enderror    
														</div>
													</div> <!-- // end form group -->


													<div class="form-group mt-3">
														<label class="info-title" for="exampleInputEmail1"><h4 class="checkout-subtitle"><b>Address</b><span class="text-danger">*</span></h4></label>
														<textarea class="form-control" name="address" id="" cols="30" rows="3" placeholder="Address"></textarea>
													</div> <!-- // end form group -->
													
												</div>	
												<!-- already-registered-login -->		
								
											</div>			
										</div>
										<!-- panel-body  -->
								
									</div><!-- row -->
								</div>
								<!-- End checkout-step-01  -->

								
							</div><!-- /.checkout-steps -->
						</div>


						<div class="col-md-4">
							<!-- checkout-progress-sidebar -->
							<div class="checkout-progress-sidebar ">
								<div class="panel-group">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
										</div>
										<div class="">
											<ul class="nav nav-checkout-progress list-unstyled">
												@foreach($carts as $item)
												
													<li style="border-left-style: none;"> 
														<strong>Image: </strong>
														@if ($item->options->image == '' || $item->options->image == null)
															<img src="{{ asset('upload/no_image.jpg') }}" style="height: 50px; width:50px;" alt="No Image">
														@else
															<img src="{{ URL::to('storage/products/thambnail', $item->options->image) }}" style="height: 80px; width:80px;">
														@endif
														<br>
													</li>

													<li style="border-left-style: none;"> 
														<strong style="padding-left: 130px; ">Qty: </strong>
														{{ $item->qty }} 
														<br>
														<br>

														{{-- <strong style="padding-left: 130px;">Color: </strong>
														{{ $item->options->color }}
														<br>
														<br> --}}

														{{-- <strong style="padding-left: 130px;">Size: </strong>
														{{ $item->options->size }}
														<br>
														<br> --}}
													</li>
												@endforeach 
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


							<!-- checkout-progress-sidebar -->
							<div class="checkout-progress-sidebar mt-5">
								<div class="panel-group">
									<div class="panel panel-default">

										<div class="panel-heading">
											<h4 class="unicase-checkout-title">Select Payment Method</h4>
										</div>

										<div class="row">
											{{-- <div class="col-md-4">
												<label for="">Stripe</label>
												<input type="radio" name="payment_method" value="stripe"><br>
												<img src="{{ asset('frontend/assets/images/payments/1.png') }}" style="height: 35px; width: 55px;" alt="">
											</div><!-- //end col md 4 --> --}}

											<div class="col-md-6">
												<label for="" style="margin-left:50px;">Bkash</label>
												<input type="radio" name="payment_method" value="bkash"><br>
												<img src="{{ asset('frontend/assets/images/payments/payments_logo/1.png') }}" style="height: 35px; width: 55px; margin-left:50px;" alt="">
											</div><!-- //end col md 4 -->

											<div class="col-md-6">
												<label for="">Cash on delivery</label>
												<input type="radio" name="payment_method" value="cash_on_delivery"><br>
												<img src="{{ asset('frontend/assets/images/payments/payments_logo/3.jpg') }}" style="height: 35px; width: 55px; margin-left: 30px;" alt="">
											</div><!-- //end col md 4 -->

										</div> <!-- // end row -->
										
										<hr>
										{{-- <button type="submit" class="btn-upper btn-flat mb-5 checkout-page-button flo">Payment Step</button> --}}
										<button type="submit" class="btn btn-success btn-flat mb-5 mt-3" style="background-color: #38E54D">Payment Step</button>

									</div>
								</div>
							</div> 
							<!-- checkout-progress-sidebar -->	
						</div>
						</form>
					</div><!-- /.row -->
				</div><!-- /.checkout-box -->
			</div><!-- /.container -->
		</div>
	</div><!-- /.body-content -->







<!-- /////////////////////////////////   Js   //////////////////////////////////-->



	<script type="text/javascript">
		$(document).ready(function() {
			$('select[name="division_id"]').on('change', function(){
				var division_id = $(this).val();
				if(division_id) {
					$.ajax({
						url: "{{  url('/district-get/ajax') }}/"+division_id,
						type:"GET",
						dataType:"json",
						success:function(data) {
							$('select[name="upazila_id"]').empty(); 
						var d =$('select[name="district_id"]').empty();
							$.each(data, function(key, value){
								$('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
							});
						},
					});
				} else {
					alert('danger');
				}
			});


			$('select[name="district_id"]').on('change', function(){
				var district_id = $(this).val();
				if(district_id) {
					$.ajax({
						url: "{{  url('/upazila-get/ajax') }}/"+district_id,
						type:"GET",
						dataType:"json",
						success:function(data) {
						var d =$('select[name="upazila_id"]').empty();
							$.each(data, function(key, value){
								$('select[name="upazila_id"]').append('<option value="'+ value.id +'">' + value.upazila_name + '</option>');
							});
						},
					});
				} else {
					alert('danger');
				}
			});
	
		});
	</script>


@endsection
