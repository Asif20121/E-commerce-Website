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
                <div style="margin-left: 20px; margin-top: -15px; color: red;"><h4><b>My Return Orders</b></h4></div>

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
                                        <label for=""><b>Order Reason</b></label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for=""><b>Order Status</b></label>
                                    </td>
                                    
                                </tr>

                                @foreach($orders as $order)
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
                                            <label for=""> {{ $order->return_reason }}</label>
                                        </td>

                                        <td class="col-md-2">
                                            @if($order->return_order == 0) 
                                                <span class="badge badge-pill badge-warning" style="background: #418DB9;"> No Return Request </span>
                                            @elseif($order->return_order == 1)
                                                <span class="badge badge-pill badge-warning" style="background: #800000;"> Pedding </span>
                                                <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>                                          
                                            @elseif($order->return_order == 2)
                                                <span class="badge badge-pill badge-warning" style="background: #008000;">Success </span>
                                             @endif
                                        </td>

                                    </tr>
                                @endforeach
                                <hr>
                            </tbody>             
                        </table>
                    </div>         
                </div> <!-- / end col md 8 -->      
            </div> <!-- // end row -->

  </div>
@endsection
