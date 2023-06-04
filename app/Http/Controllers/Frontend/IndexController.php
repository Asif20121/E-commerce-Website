<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        $data['carts'] = Cart::content();
        $data['hot_deal'] = Product::orderBy('id', 'asc')->where('hot_deals', 1)->where('status',1)->take(10)->get();
        $data['featured'] = Product::orderBy('id', 'asc')->where('featured', 1)->where('status',1)->take(10)->get();
        $data['special_offer'] = Product::orderBy('id', 'asc')->where('special_offer', 1)->where('status',1)->take(12)->get();
        $data['special_deals'] = Product::orderBy('id', 'asc')->where('special_deals', 1)->where('status',1)->take(10)->get();
        $category = Category::orderBy('id', 'asc')->select('id')->get();

        foreach ($category as $key => $value) {
            $category_wise_product[$key] = Product::orderBy('id', 'asc')->with('category')->where('category_id',$value->id)->where('status',1)->take(10)->get();
        }

        $data['category_wise_product']=  $category_wise_product;
      
        return view('frontend.index')->with($data);
        // return view('Frontend.text');

    }

    public function Bangla(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','bangla');
        return redirect()->back();
    }
    public function English(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
    public function ProductDetail($id){
        $product = Product::findOrFail($id);
        return view('frontend.product.product_details',compact('product'));
    }
    /// Product View With Ajax
	public function ProductViewAjax($id){
        $carts = Cart::content();
        $multiImg= MultiImg::where('product_id', $id )->get();
        $product = Product::with('category','brand')->findOrFail($id);
		$color = $product->product_color_en;
		$product_color = explode(',', $color);
		$size = $product->product_size_en;
		$product_size = explode(',', $size);
        
		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,
			'carts' => $carts,
			'multiImg' => $multiImg,
		));
	} // end method 

    public function ProductDirectAdd($id){
        $product = Product::with('category','brand')->findOrFail($id);
		$color = $product->product_color_en;
		$product_color = explode(',', $color);
		$size = $product->product_size_en;
		$product_size = explode(',', $size);
        
		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,
		));
	}

    public function ShowSlider(){
        $slider= Slider::orderBy('id', 'asc')->get();
        return response()->json(array(
            'sliders' => $slider,
        ));
    }
}
