@extends('frontend.master')
@section('mainpage')

    <style>
        .body-content .my-wishlist-page .my-wishlist table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
        vertical-align: middle;
        border: none;
        padding: 15px;
        }
    </style>

    <div class="content_one">
       
        <div class="row p-5">

            <div style="margin-top: -15px; color: red;"><h4><b>My Details</b></h4>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Shipping Details</h4></div>
                    <hr>
                    <div class="card-body" style="background: #E9EBEC">
                        <table class="table">
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
                </div>
            </div>  <!-- // end col-md 5 -->


            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h4>Order Details 
                        <br>
                        <span class="text-danger">Invoice : {{ $order->invoice_no }}</span></h4>
                    </div>
                    <hr>
                    <div class="card-body" style="background: #E9EBEC">
                        <table class="table">
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
                        </table>
                    </div>
                </div>
            </div>  <!-- // 2ND end col-md 5 -->


            <div class="row mt-5">
                <div class="col-md">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody class="">   
                                <tr style="background: #e0e0e0;">
                                    <td class="col-md-1">
                                        <label for=""><b>Image</b></label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""><b>Product Name</b></label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> <b>Product Code</b></label>
                                    </td>


                                    <td class="col-md-2">
                                        <label for=""><b>Color</b></label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""><b>Size</b></label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""><b>Quantity</b></label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""><b>Price</b></label>
                                    </td>
                                    
                                </tr>

                                @foreach($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for="">
                                                @if ($item->product->product_thambnail == '' || $item->product->product_thambnail == null)
                                                    <img src="{{ asset('upload/no_image.jpg') }}" style="height: 50px; width:70px;" alt="No Image">
                                                @else
                                                    <img src="{{ URL::to('storage/products/thambnail', $item->product->product_thambnail) }}" style="height: 50px; width:70px;">
                                                @endif
                                            </label>
                                        </td>

                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->product_name_en }}</label>
                                        </td>


                                        <td class="col-md-3">
                                            <label for=""> {{ $item->product->product_code }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->size }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> ${{ $item->price }} ( ${{ $item->price * $item->qty }} ) </label>
                                        </td>                    
                                    </tr>
                                @endforeach

                            </tbody>             
                        </table>
                    </div>         
                </div> <!-- / end col md 8 --> 



            </div> <!-- // END order item row -->



            @if ($order->status !== "delivered")
            
            @else 

                @php
                    $order = App\Models\Order::where('id', $order->id)->where('return_reason', '=', NULL)->first();
                @endphp


                @if ($order)
                    <form action="{{ route('return.order',$order->id) }}" method="POST">
                        @csrf  
                        <div class="form-group col-md-8">
                            <label for="label"><b>Order Return Reason:</b></label>
                            <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-danger">Order Return</button>

                    </form>
                @else
                    <span class="badge badge-pill badge-warning col-md-6" style="background: red"><h5>You Have send return request for this product.</h5></span>
                @endif

            @endif



        </div> <!-- // end row -->
       
  </div>
@endsection
