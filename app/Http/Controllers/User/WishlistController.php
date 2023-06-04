<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function ViewWishlist(){
        $data['main_category']  = Category::orderBy('id', 'asc')->get();
        $data['sub_category']  = SubCategory::orderBy('id', 'asc')->get();
        $data['sub_sub_category']  = SubSubCategory::orderBy('id', 'asc')->get();
		return view('frontend.wishlist.view_wishlist')->with($data);
    
	}

	public function GetWishlistProduct(){
		$wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		return response()->json($wishlist);
	} // end mehtod 


	public function RemoveWishlistProduct($id){

		Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully Product Remove']);
	}

}
