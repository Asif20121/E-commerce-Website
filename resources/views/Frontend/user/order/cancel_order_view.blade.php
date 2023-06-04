@extends('frontend.master')
@section('mainpage')

    @section('title')
    My Orders
    @endsection

    <style>
        .body-content .my-wishlist-page .my-wishlist table > thead > tr > th,
        .table > tbody > tr > th,
        .table > tfoot > tr > th,
        .table > thead > tr > td,
        .table > tbody > tr > td,
        .table > tfoot > tr > td {
        vertical-align: middle;
        border: none;
        padding: 20px;
        }
    </style>

    <div class="content_one">
       
            <div class="row p-5">

              
                {{-- <div class="col-md-2">
                    @include('frontend.common.user_sidebar')
                </div> --}}
                <div style="margin-top: -15px; color: red;"><h4><b>My Cancel Orders</b></h4></div>

                <div class="col-md">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>   
                                <tr style="background: #e0e0e0;">
                                    <td class="col-md-1">
                                        <label for=""><b>Date</b></label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""><b>Total Amount</b></label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for=""> <b>Payment Method</b></label>
                                    </td>


                                    <td class="col-md-2">
                                        <label for=""><b>Invoice Number</b></label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""><b>Order Status</b></label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for=""><b>Action</b></label>
                                    </td>
                                    
                                </tr>

                                @forelse($orders as $order)
                                    <tr>
                                        <td class="col-md-1">
                                            <label for=""> {{ $order->order_date }}</label>
                                        </td>

                                        <td class="col-md-3">
                                            <label for=""> ${{ $order->amount }}</label>
                                        </td>


                                        <td class="col-md-3">
                                            <label for=""> {{ $order->payment_method }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for=""> {{ $order->invoice_no }}</label>
                                        </td>

                                        <td class="col-md-2">
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
                                        </td>

                                        <td class="col-md-1">
                                            <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>
                                            <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>                       
                                        </td>                     
                                    </tr>

                                @empty
                                <h2 class="text-danger">Order Nto Found</h2>
                                
                                @endforelse
                                <hr>
                            </tbody>             
                        </table>
                    </div>         
                </div> <!-- / end col md 8 -->      
            </div> <!-- // end row -->

  </div>
@endsection
