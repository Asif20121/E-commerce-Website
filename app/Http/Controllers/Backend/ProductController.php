<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{

    public function DetailsViewProduct($id)
    {
        $details_view_product = Product::with('category', 'brand', 'subcategory')->find($id);
        // dd($details_view_product);
        $multiImgs = MultiImg::where('product_id', $id)->get();
        return view('backend.product.product_details_view', compact('details_view_product', 'multiImgs'));
    }



    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands'));
    }


    public function StoreProduct(Request $request)
    {

        $filename = null;
        if (isset($request->product_thambnail)) {
            $product_thambnail = $request->file('product_thambnail');
            $filename = time().'.'.$request->file('product_thambnail')->getClientOriginalExtension();
            // .'.'.$request->file('product_thambnail')->getClientOriginalExtension();
            Storage::putFileAs('public/products/thambnail', $request->file('product_thambnail'), $filename);
            // $destinationPath = public_path('product_thambnail_vision');
            $destinationPath =  storage_path('app/public/products/thambnail');
            // exit;
            // $manager = new Image(['driver' => 'imagick']);
            $img = Image::make($product_thambnail->path());
            $img->resize(917, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);
        }
        // $news->product_thambnail = $filename;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_bn' => $request->product_name_bn,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $filename,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        ////////////  Multiple Image Upload Start  ////////////
        $images = $request->file('multi_img');
       
        foreach ($images as $img) {
            $filename = time().'.'.$img->getClientOriginalName();
            // .'.'.$request->file('product_thambnail')->getClientOriginalExtension();
            Storage::putFileAs('public/products/multi-image', $img, $filename);
            // $destinationPath = public_path('product_thambnail_vision');
            $destinationPath =  storage_path('app/public/products/multi-image');
            // exit;
            // $manager = new Image(['driver' => 'imagick']);
            $img = Image::make($img->path());
            $img->resize(917, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);


            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $filename,
                'created_at' => Carbon::now(),
            ]);

        }
        ////////////  Multiple Image Upload End  ////////////

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }



    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }


    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiImgs'));
    }


    public function ProductDataUpdate(Request $request, $id)
    {
        $product = Product::find($id);

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name_en = $request->product_name_en;
        $product->product_name_bn = $request->product_name_bn;
        $product->product_slug_en = strtolower(str_replace(' ', '-', $request->product_name_en));
        $product->product_slug_bn = str_replace(' ', '-', $request->product_name_bn);
        $product->product_code = $request->product_code;
        $product->product_qty = $request->product_qty;
        $product->product_tags_en = $request->product_tags_en;
        $product->product_tags_bn = $request->product_tags_bn;
        $product->product_size_en = $request->product_size_en;
        $product->product_size_bn = $request->product_size_bn;
        $product->product_color_en = $request->product_color_en;
        $product->product_color_bn = $request->product_color_bn;

        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->short_descp_en = $request->short_descp_en;
        $product->short_descp_bn = $request->short_descp_bn;
        $product->long_descp_en = $request->long_descp_en;
        $product->long_descp_bn = $request->long_descp_bn;

        $product->hot_deals = $request->hot_deals;
        $product->featured = $request->featured;
        $product->special_offer = $request->special_offer;
        $product->special_deals = $request->special_deals;
        $product->status = 1;
        $product->created_at = Carbon::now();

        $product->update();
        if ($product) {
            $notification = array(
                'message' => 'Product Updated Without Image Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-product')->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Product Updated Failed');
        }
    }


    //////// Multi Image Update /////////
    public function MultiImageUpdate(Request $request)
    {
        $imgs = $request->multi_img;
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            $filename = time().'.'.$img->getClientOriginalName();
            // .'.'.$request->file('product_thambnail')->getClientOriginalExtension();
            Storage::putFileAs('public/products/multi-image', $img, $filename);
            // $destinationPath = public_path('product_thambnail_vision');
            $destinationPath =  storage_path('app/public/products/multi-image');
            // exit;
            $img = Image::make($img->path());
            $img->resize(917, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);

            //remove old image
            if($img){
                $old_filename = public_path("storage\products\multi-image\\" . $imgDel->photo_name);
                if (file_exists($old_filename) != false) {
                    unlink($old_filename);
                }
            }

            MultiImg::where('id', $id)->update([
                'photo_name' => $filename,
                'updated_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }



    //////// Product Main Thabnail Update /////////
    public function ThambnailImageUpdate(Request $request, $id)
    {
        $product_thambnail_img = Product::find($id);
        $product_thambnail_img->product_thambnail;
        if (isset($request->product_thambnail)) {
            $product_thambnail = $request->file('product_thambnail');
            $filename = time().'.'.$request->file('product_thambnail')->getClientOriginalExtension();
            // .'.'.$request->file('product_thambnail')->getClientOriginalExtension();
            Storage::putFileAs('public/products/thambnail', $request->file('product_thambnail'), $filename);
            // $destinationPath = public_path('product_thambnail_vision');
            $destinationPath =  storage_path('app/public/products/thambnail');
            // exit;
            $img = Image::make($product_thambnail->path());
            $img->resize(917, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);

            //remove old image
            if($product_thambnail_img->product_thambnail){
                $old_filename = public_path("storage\products\\thambnail\\" . $product_thambnail_img->product_thambnail);
                if (file_exists($old_filename) != false) {
                    unlink($old_filename);
                }
            }

            $product_thambnail_img->product_thambnail = $filename;
        }
        $product_thambnail_img->update();
        if ($product_thambnail_img) {
            $notification = array(
                'message' => 'Product Thambnail Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Product Thambnail Updated Failed');
        }
        
    }


    ////////// Multi Image Delete ///////////
    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        $path = public_path("storage\products\multi-image\\" . $oldimg->photo_name );
        if (File::exists($path)) {
            File::delete($path);
        }
        $oldimg->delete();
        if ($oldimg) {
            $notification = array(
                'message' => 'Product Image Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Product Image Deleted Failed');
        }
    }


    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }



    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function ProductDelete($id)
    {
        $product = Product::findOrFail($id);
        $path = public_path("storage\products\\thambnail\\" . $product->product_thambnail );
        if (File::exists($path)) {
            File::delete($path);
        }
        $product->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            $path = public_path("storage\products\\multi-image\\" . $img->photo_name );
            if (File::exists($path)) {
                File::delete($path);
            }
           MultiImg::where('product_id', $id)->delete();
        }
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }



    //  Product Stock
    public function ProductStock()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    }


}

