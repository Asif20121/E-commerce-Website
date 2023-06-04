<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use PhpParser\Node\Expr\Cast\Array_;

class ProductPageController extends Controller
{
    public function ShowProductCategoryPage($mainCategory_id, $mainCategory_name)
    {
        $data['carts'] = Cart::content();
        $data['main_category']  = Category::where('id',$mainCategory_id)->first();
        $data['product']  = Product::where('category_id',$mainCategory_id)->get();
        return view('frontend.ProductPage.category_page')->with($data);
    }

    public function ShowProductSubCategoryPage($mainCategory_id, $mainCategory_name){
        $data['carts'] = Cart::content();
        $data['sub_category']  = SubCategory::where('id',$mainCategory_id)->with('category')->first();
        $data['product']  = Product::where('subcategory_id',$mainCategory_id)->get();
        return view('frontend.ProductPage.sub_category')->with($data);
    }

    public function ShowProductSubSubCategoryPage($mainCategory_id, $mainCategory_name){
        $data['carts'] = Cart::content();
        $data['sub_sub_category']  = SubSubCategory::where('id',$mainCategory_id)->with('category','subcategory')->first();
        $data['product']  = Product::where('subsubcategory_id',$mainCategory_id)->get();
        return view('frontend.ProductPage.sub_sub_category')->with($data);
    }

    public function ShowSpecialPage(){
        $data['carts'] = Cart::content();
        $data['product']  = Product::orderBy('id', 'desc')->where('special_offer', 1)->get();
        return view('frontend.ProductPage.special_category')->with($data);
    }

    public function ShowSpecialDealPage(){
        $data['carts'] = Cart::content();
        $data['product']  = Product::orderBy('id', 'desc')->where('special_deals', 1)->get();
        return view('frontend.ProductPage.special_deal')->with($data);
    }

    public function ShowFeaturedPage(){
        $data['carts'] = Cart::content();
        $data['product']  = Product::orderBy('id', 'desc')->where('featured', 1)->get();
        return view('frontend.ProductPage.featured')->with($data);
    }

    public function ShowHotDealPage(){
        $data['carts'] = Cart::content();
        $data['product']  = Product::orderBy('id', 'desc')->where('hot_deals', 1)->get();
        return view('frontend.ProductPage.hot_deal')->with($data);
    }

    public function ShowAllBrandPage(){
        $data['brands'] = Brand::orderBy('id', 'desc')->get();
        return view('frontend.ProductPage.brand_page')->with($data);
    }

    public function ShowSingleBrandPage($brand_id){
        $data['carts'] = Cart::content();
        $data['product'] = Product::where('brand_id', $brand_id)->where('status', 1)->get();
        $data['brand'] = Brand::where('id', $brand_id)->first();
        return view('frontend.ProductPage.brand_product')->with($data);
    }
    public function get_product_name()
    {
        $products = Product::latest()->select('product_name_en','product_name_bn')->get();
        $array = array();
        if (session()->get('language')=='bangla'){
            foreach($products as $product){
                array_push($array, $product->product_name_bn);
            }
        }else{
            foreach($products as $product){
                array_push($array, $product->product_name_en);
            }
        }
        return $array;		
    }
}
