<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }


    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required|max:100',
            'brand_name_bn' => 'required|max:100',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Input Brand English Name',
            'brand_name_bn.required' => 'Input Brand Bangla Name',
        ]);

        // $image = $request->file('brand_image');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(300,300)->save('upload/brand'.$name_gen);
        // $save_url = 'upload/brand/'.$name_gen;

        $filename = null;
            if (isset($request->brand_image)) {
                $brand_image = $request->file('brand_image');
                $filename = time().'.'.$request->file('brand_image')->getClientOriginalExtension();
                // .'.'.$request->file('brand_image')->getClientOriginalExtension();
                Storage::putFileAs('public/brand', $request->file('brand_image'), $filename);
                // $destinationPath = public_path('brand_image_vision');
                $destinationPath =  storage_path('app/public/brand');
                // exit;
                // $manager = new Image(['driver' => 'imagick']);
                $img = Image::make($brand_image->path());
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$filename);
            }
            // $news->brand_image = $filename;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_bn' => $request->brand_name_bn,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_bn' => str_replace(' ', '-', $request->brand_name_bn),
            'brand_image'   => $filename,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }


    public function BrandUpdate(Request $request, $id)
    {
        
        $brand = Brand::find($id);

        $brand->brand_image;
        // $filename = null;
        if (isset($request->brand_image)) {
            $image = $request->file('brand_image');
            $filename = time().'.'.$request->file('brand_image')->getClientOriginalName();
            // .'.'.$request->file('brand_image')->getClientOriginalExtension();
            Storage::putFileAs('public/brand', $request->file('brand_image'), $filename);
            // echo 
            $destinationPath =  storage_path('app/public/brand');
            // exit;
            $img = Image::make($image->path());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);

            //remove old image
            if($brand->brand_image){
                $old_filename = public_path("storage\brand\\" . $brand->brand_image);
                if (file_exists($old_filename) != false) {
                    unlink($old_filename);
                }
            }

            $brand->brand_image = $filename;
        }

        // $date_data = $request->input('date');
        // $fatchdate_array =  explode("/", $date_data);
        // $converted_date = '20'.$fatchdate_array[0].'-'.$fatchdate_array[1].'-'.$fatchdate_array[2];
        // dd($result_date);

        $brand->brand_name_en = $request->input('brand_name_en');
        $brand->brand_name_bn = $request->input('brand_name_bn');
        $brand->brand_slug_en = strtolower(str_replace(' ', '-', $request->brand_name_en));
        $brand->brand_slug_bn = str_replace(' ', '-', $request->brand_name_bn);
        // $brand->brand_image = $filename;
        // dd($news);
        $brand->update();
        if ($brand) {
            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Brand Updated Failed');
        }

    }

    
    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $path = public_path("storage\brand\\" . $brand->brand_image );
        if (File::exists($path)) {
            File::delete($path);
        }
        $brand->delete();
        if ($brand) {
            $notification = array(
                'message' => 'Brand Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Brand Deleted Failed');
        }
    }

}
