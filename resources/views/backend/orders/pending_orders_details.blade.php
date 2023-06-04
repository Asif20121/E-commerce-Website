@extends('admin.admin_master')
@section('admin')

    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">



        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h2 class="page-title head-text">Order Details</h2>
					<div class="d-inline-block align-items-cente head-textr">
						<nav>
							<ol class="breadcrumb head-text">
								<li class="breadcrumb-item"><a href="{{ route('prnding-orders') }}"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Order Details</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>



      <!-- Content Header (Page header) -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
            
            <div class="col-md-6 col-12">
				<div class="border-info">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Shipping Details</strong></h4>
                    </div>

                    <table class="table table-striped box-bordered border-info box-body head-text">
                        <tr>
                            <th>Shipping Name :</th>
                            <th>{{ $order->name }}</th>
                        </tr>
                        <tr>
                            <th>Shipping Phone :</th>
                            <th>{{ $order->phone }}</th>
                        </tr>
                        <tr>
                            <th>Shipping Email :</th>
                            <th>{{ $order->email }}</th>
                        </tr>
                        <tr>
                            <th>Gender :</th>
                            <th>{{ $order->gender }}</th>
                        </tr>
                        <tr>
                            <th>Date of Birth :</th>
                            <th>{{ $order->date_of_birth }}</th>
                        </tr>
                        <tr>
                            <th>Shipping Address :</th>
                            <th>{{ $order->address }}</th>
                        </tr>
                        <tr>
                            <th>Order Date :</th>
                            <th>{{ $order->order_date }}</th>
                        </tr>
                        <tr>
                            <th>Division :</th>
                            <th>{{ $order->division->division_name }}</th>
                        </tr>
                        <tr>
                            <th>District :</th>
                            <th>{{ $order->district->district_name }}</th>
                        </tr>
                        <tr>
                            <th>Upazila :</th>
                            <th>{{ $order->upazila->upazila_name }}</th>
                        </tr>
                    </table>

				</div>
			</div> <!--end col md 6 -->


            <div class="col-md-6 col-12">
				<div class="border-info">
                    <div class="box-header with-border">
                        <h4 class="box-title"><strong>Order Details</strong>&nbsp;</h4>
                        <br>
                        <br>
                        <h5><span class="" style="color: #ff0101">Invoice : {{ $order->invoice_no }}</span></h5>        
                    </div>
                    
                    <table class="table table-striped box-bordered border-info box-body head-text">
                        <tr>
                            <th>Name :</th>
                            <th>{{ $order->user->name }}</th>
                        </tr>
                        <tr>
                            <th>Phone :</th>
                            <th>{{ $order->user->phone }}</th>
                        </tr>
                        <tr>
                            <th>Payment Type :</th>
                            <th>{{ $order->payment_method }}</th>
                        </tr>
                        <tr>
                            <th>Tranx ID :</th>
                            <th>{{ $order->transaction_id }}</th>
                        </tr>
                        <tr>
                            <th>Invoice :</th>
                            <th class="text-danger">{{ $order->invoice_no }}</th>
                        </tr>
                        <tr>
                            <th>Order Total :</th>
                            <th>${{ $order->amount }}</th>
                        </tr>
                        <tr>
                            <th>Order :</th>
                            <th>
                                <label for=""> 
                                    @if($order->status == 'pending')        
                                        <span class="badge badge-pill badge-warning" style="background: #800080;"> Pending </span>
                                    @elseif($order->status == 'confirm')
                                        <span class="badge badge-pill badge-warning" style="background: #0000FF;"> Confirm </span>

                                    @elseif($order->status == 'processing')
                                        <span class="badge badge-pill badge-warning" style="background: #FFA500;"> Processing </span>

                                    @elseif($order->status == 'picked')
                                        <span class="badge badge-pill badge-warning" style="background: #808000;"> Picked </span>

                                    @elseif($order->status == 'shipped')
                                        <span class="badge badge-pill badge-warning" style="background: #808080;"> Shipped </span>

                                    @elseif($order->status == 'delivered')
                                        <span class="badge badge-pill badge-warning" style="background: #008000;"> Delivered </span>

                                    @if($order->return_order == 1) 
                                        <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>
                                    @endif

                                    @else
                                        <span class="badge badge-pill badge-warning" style="background: #FF0000;"> Cancel </span>
                                    @endif
                                </label>
                            </th>
                        </tr>

                        <tr>
                            <th></th>
                            <th>
                                @if ($order->status == 'pending')
                                    <a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                
                                @elseif($order->status == 'confirm')
                                    <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Processing Order</a>

                                @elseif($order->status == 'processing')
                                    <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Picked Order</a>

                                @elseif($order->status == 'picked')
                                    <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Shipped Order</a>
                                
                                @elseif($order->status == 'shipped')
                                    <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a>
                                
                                @endif
                            </th>
                        </tr>

                    </table>

				</div>
			</div><!--end col md 6 -->



            <div class="col-md-12 col-12">
				<div class="border-info">
                    <div class="box-header with-border">
                        
                    </div>


                    <table class="table table-striped box-bordered border-info box-body head-text">
                        <tbody class="">   
                            <tr>
                                <td width="10%">
                                    <label for=""><b>Image</b></label>
                                </td>

                                <td width="20%">
                                    <label for=""><b>Product Name</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""> <b>Product Code</b></label>
                                </td>


                                <td width="10%">
                                    <label for=""><b>Color</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Size</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Quantity</b></label>
                                </td>

                                <td width="10%">
                                    <label for=""><b>Price</b></label>
                                </td>
                                
                            </tr>

                            @foreach($orderItem as $item)
                                <tr>
                                    <td width="10%">
                                        <label for="">
                                            @if ($item->product->product_thambnail == '' || $item->product->product_thambnail == null)
                                                <img src="{{ asset('upload/no_image.jpg') }}" style="height: 50px; width:70px;" alt="No Image">
                                            @else
                                                <img src="{{ URL::to('storage/products/thambnail', $item->product->product_thambnail) }}" style="height: 50px; width:70px;">
                                            @endif
                                        </label>
                                    </td>

                                    <td width="20%">
                                        <label for=""> {{ $item->product->product_name_en }}</label>
                                    </td>


                                    <td width="10%">
                                        <label for=""> {{ $item->product->product_code }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> {{ $item->color }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> {{ $item->size }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> {{ $item->qty }}</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> ${{ $item->price }} ( ${{ $item->price * $item->qty }} ) </label>
                                    </td>                    
                                </tr>
                            @endforeach

                        </tbody>             
                    </table>

				</div>
			</div><!-- col md 12 -->



        </div><!-- end row -->
      </section><!-- /.content -->
    
    </div>

@endsection
