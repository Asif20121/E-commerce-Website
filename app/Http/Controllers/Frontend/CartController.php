<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\ShipDivision;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Response;

// use Gloudemans\Shoppingcart\Cart;


class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);
        } else {

            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added on Your Cart']);
        }
    } // end mehtod 

    public function ProductDirectAdd(Request $request){

        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();
		 if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($request->id);

        // dd($product);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $request->id,
                'name' => $product->product_name_en,
                'qty' => 1,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => "red",
                    'size' => "small",
                ],
            ]);

            return response()->json(
                array(
                    'success' => 'Successfully Added on Your Cart',
                    'carts' => $carts,
                    'cartQty' => $cartQty,
                    'cartTotal' => round($cartTotal),
                )
            );
        } else {

            Cart::add([
                'id' => $request->id,
                'name' => $product->product_name_en,
                'qty' => 1,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => "red",
                    'size' => "small",
                ],
            ]);
            return response()->json( array(
                'success' => 'Successfully Added on Your Cart',
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => round($cartTotal),
            ));
        }
	}



    // Mini Cart Section
    public function AddMiniCart()
    {
       
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        if (Session::has('coupon')) {
            return response()->json(array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => session()->get('coupon')['total_amount'],
                
            ));
        }else{
            return response()->json(array(
                'carts' => $carts,
                'cartQty' => $cartQty,
                'cartTotal' => round($cartTotal),
            ));
        }

    } // end method 




    /// remove mini cart 
    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove from Cart']);
    } // end mehtod 


    // add to wishlist mehtod 

    public function AddToWishlist(Request $request, $product_id)
    {

        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json([
                    'success' => 'Successfully Added On Your Wishlist',
            ]);
            } else {

                return response()->json(['error' => 'This Product has Already on Your Wishlist']);
            }
        } else {

            return response()->json(['error' => 'At First Login Your Account']);
        }
    } // end method 




    public function CouponApply(Request $request)
    {

        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        
        if ($coupon) {

            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round( Cart::total() * $coupon->coupon_discount / 100 ),
                'total_amount' => round( Cart::total() - Cart::total() * $coupon->coupon_discount / 100 )
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    } // end method 


    
    public function CouponCalculation()
    {

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // end method 



    // Remove Coupon 
    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }


    

    // Checkout Method 
    public function CheckoutCreate()
    {

        if (Auth::check()) {
            if (Cart::total() > 0) {
                $data['carts'] = Cart::content();
                $data['cartQty'] = Cart::count();
                $data['cartTotal'] = Cart::total();
                $data['divisions'] = ShipDivision::orderBy('division_name', 'ASC')->get();
                $data['main_category']  = Category::orderBy('id', 'asc')->get();
                $data['sub_category']  = SubCategory::orderBy('id', 'asc')->get();
                $data['sub_sub_category']  = SubSubCategory::orderBy('id', 'asc')->get();
                return view('frontend.checkout.checkout_view')->with($data);
            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
                // dd('message ok');

            }
        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    } // end method 
}
