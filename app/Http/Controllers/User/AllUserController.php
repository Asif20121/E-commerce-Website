<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrders()
    {
       $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
       return view('frontend.user.order.order_view', compact('orders'));
    }


    public function OrderDetails($order_id)
    {
        $order = Order::with('division', 'district', 'upazila', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('frontend.user.order.order_details', compact('order', 'orderItem'));
    }


    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division', 'district', 'upazila', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        // return view('frontend.user.order.order_invoice', compact('order', 'orderItem'));

        $pdf = Pdf::loadView('frontend.user.order.order_invoice', compact('order', 'orderItem'));
        // dd('ok');
        return $pdf->download('invoice.pdf');

    }



    public function ReturnOrder(Request $request, $order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    }



    public function ReturnOrderList()
    {
        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.return_order_view', compact('orders'));
    }


    public function CancelOrders()
    {
        $orders = Order::where('user_id', Auth::id())->where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.cancel_order_view', compact('orders'));
    }



    public function OrdersCancel($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'cancel',
        ]);

        $notification = array(
            'message' => 'Order Cancel Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}
