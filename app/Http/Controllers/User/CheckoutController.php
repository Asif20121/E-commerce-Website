<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\Shipping;
use App\Models\ShipUpazila;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {
        $ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }


    public function UpazilaGetAjax($district_id)
    {
        $ship = ShipUpazila::where('district_id', $district_id)->orderBy('upazila_name', 'ASC')->get();
        return json_encode($ship);
    }


    public function CheckoutStore(Request $request)
    {
        // dd($request->all());
        
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['gender'] = $request->gender;
        $data['date_of_birth'] = $request->date_of_birth;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['upazila_id'] = $request->upazila_id;
        $data['address'] = $request->address;
        
        $cartTotal = Cart::total();

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        }elseif ($request->payment_method == 'bkash') {
            return 'bkash';
        }else{
            return view('frontend.payment.cash', compact('data', 'cartTotal'));
        }


    }
}
