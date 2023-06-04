<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function AdminDashboard()
    {
        $data['brands'] = Brand::get();
        $data['category'] = Category::get();
        $data['sub_category'] = SubCategory::get();
        $data['sub_sub_category'] = SubSubCategory::get();
        $data['product'] = Product::get();
        $data['slider'] = Slider::get();
        $data['coupon'] = Coupon::get();
        $data['return_order'] = Order::where('return_order', 1)->get();
        $data['pending_order'] = Order::where('status', 'pending')->get();
        $data['confirmed_order'] = Order::where('status', 'confirm')->get();
        $data['processing_order'] = Order::where('status', 'processing')->get();
        $data['picked_order'] = Order::where('status', 'picked')->get();
        $data['shipped_order'] = Order::where('status', 'shipped')->get();
        $data['delivered_order'] = Order::where('status', 'delivered')->get();
        $data['cancel_order'] = Order::where('status', 'cancel')->get();
        $data['user'] = User::get();

        return view('admin.index', with($data));
    }
}











// <div class="col-md-4" style="margin-left: -110px;">
//                     <div class="book bg-dark" style="width: 200px;">
//                         <p>50000 &nbsp;&nbsp;টাকা</p>
//                         <div class="cover" style="background-color: C4DFDF">
//                             <p style="color:#000">Today Sales Amount</p>
//                         </div>
//                     </div>
//                 </div>
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

//                 <div class="col-md-4" style="margin-left: 90px;">
//                     <div class="book bg-dark" style="width: 200px;">
//                         <p>50000 &nbsp;টাকা</p>
//                         <div class="cover" style="background-color: #FFF8D6">
//                             <p style="color:#000">Monthly Sales Amount</p>
//                         </div>
//                     </div>
//                 </div>
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
//                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


//                 <div class="col-md-4" style="margin-left: 90px;">
//                     <div class="book bg-dark" style="width: 200px;">
//                         <p>50000 &nbsp;&nbsp;টাকা</p>
//                         <div class="cover" style="background-color: C4DFDF">
//                             <p style="color:#000">Yearly Sales Amount</p>
//                         </div>
//                     </div>
//                 </div>