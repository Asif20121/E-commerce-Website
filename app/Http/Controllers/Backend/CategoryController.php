<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    }


    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required|max:100',
            'category_name_bn' => 'required|max:100',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Input Category English Name',
            'category_name_bn.required' => 'Input Category Bangla Name',
        ]);

        $filename = null;
            if (isset($request->category_icon)) {
                $category_icon = $request->file('category_icon');
                $filename = time().'.'.$request->file('category_icon')->getClientOriginalExtension();
                // .'.'.$request->file('category_icon')->getClientOriginalName();
                Storage::putFileAs('public/category_icon', $request->file('category_icon'), $filename);
                // $destinationPath = public_path('category_icon_vision');
                $destinationPath =  storage_path('app/public/category_icon');
                // exit;
                // $manager = new Image(['driver' => 'imagick']);
                $img = Image::make($category_icon->path());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$filename);
            }

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_bn' => $request->category_name_bn,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_bn' => str_replace(' ', '-', $request->category_name_bn),
            'category_icon'    => $filename,

        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }


    public function CategoryUpdate(Request $request, $id)
    {

        $request->validate([
            'category_name_en' => 'required|max:100',
            'category_name_bn' => 'required|max:100',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Input Category English Name',
            'category_name_bn.required' => 'Input Category Bangla Name',
        ]);

        $category = Category::find($id);

        $category->category_icon;
        // $filename = null;
        if (isset($request->category_icon)) {
            $image = $request->file('category_icon');
            $filename = time().'.'.$request->file('category_icon')->getClientOriginalExtension();
            Storage::putFileAs('public/category_icon', $request->file('category_icon'), $filename);
            // echo 
            $destinationPath =  storage_path('app/public/category_icon');
            // exit;
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$filename);

            //remove old image
            if($category->category_icon){
                $old_filename = public_path("storage\category_icon\\" . $category->category_icon);
                if (file_exists($old_filename) != false) {
                    unlink($old_filename);
                }
            }

            $category->category_icon = $filename;
        }

        $category->category_name_en = $request->input('category_name_en');
        $category->category_name_bn = $request->input('category_name_bn');
        $category->category_slug_en = strtolower(str_replace(' ', '-', $request->brand_name_en));
        $category->category_slug_bn = str_replace(' ', '-', $request->brand_name_bn);
        // dd($news);
        $category->update();
        if ($category) {
            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.category')->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Category Updated Failed');
        }
    }


    public function CategoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $path = public_path("storage\category_icon\\" . $category->category_icon );
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
        if ($category) {
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Category Deleted Failed');
        }
    }
}
