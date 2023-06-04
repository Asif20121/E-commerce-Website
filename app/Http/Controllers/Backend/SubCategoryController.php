<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        // dd('ok');
        return view('backend.category.subcategory_view', compact('subcategory', 'categories'));
    }


    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required|max:100',
            'subcategory_name_en' => 'required|max:100',
            'subcategory_name_bn' => 'required|max:100',
        ],[
            'category_id.required' => 'Please select any option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
            'subcategory_name_bn.required' => 'Input SubCategory Bangla Name',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-', $request->subcategory_name_bn),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit', compact('subcategory', 'categories'));
    }


    public function SubCategoryUpdate(Request $request, $id)
    {

        $request->validate([
            'category_id' => 'required|max:100',
            'subcategory_name_en' => 'required|max:100',
            'subcategory_name_bn' => 'required|max:100',
        ],[
            'category_id.required' => 'Please select any option',
            'subcategory_name_en.required' => 'Input SubCategory English Name',
            'subcategory_name_bn.required' => 'Input SubCategory Bangla Name',
        ]);

        $subcategory = SubCategory::find($id);

        $subcategory->category_id = $request->input('category_id');
        $subcategory->subcategory_name_en = $request->input('subcategory_name_en');
        $subcategory->subcategory_name_bn = $request->input('subcategory_name_bn');
        $subcategory->subcategory_slug_en = strtolower(str_replace(' ', '-', $request->subcategory_name_en));
        $subcategory->subcategory_slug_bn = str_replace(' ', '-', $request->subcategory_name_bn);
        // dd($news);
        $subcategory->update();
        if ($subcategory) {
            $notification = array(
                'message' => 'SubCategory Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.subcategory')->with($notification);
        } else {
            return redirect()->back()->with('fail', 'SubCategory Updated Failed');
        }
    }


    public function SubCategoryDelete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        if ($subcategory) {
            $notification = array(
                'message' => 'SubCategory Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'SubCategory Deleted Failed');
        }
    }






    /////////////////////////////  That for SUB->SUBCATEGORY  /////////////////////////////




    public function SubSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view', compact('subsubcategory', 'categories'));
    }


    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);
    }


    public function GetSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subsubcat);
    }


    public function SubSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required|max:100',
            'subcategory_id' => 'required|max:100',
            'subsubcategory_name_en' => 'required|max:100',
            'subsubcategory_name_bn' => 'required|max:100',
        ],[
            'category_id.required' => 'Please select any option',
            'subsubcategory_name_en.required' => 'Input SubSubCategory English Name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ', '-', $request->subsubcategory_name_bn),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('categories', 'subcategories', 'subsubcategories'));
    }


    public function SubSubCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'subsubcategory_name_en' => 'required|max:100',
            'subsubcategory_name_bn' => 'required|max:100',
        ],[
            'subsubcategory_name_en.required' => 'Input Sub-SubCategory English Name',
            'subsubcategory_name_bn.required' => 'Input Sub-SubCategory Bangla Name',
        ]);

        $subsubcategory = SubSubCategory::findOrFail($id);

        $subsubcategory->category_id = $request->input('category_id');
        $subsubcategory->subcategory_id = $request->input('subcategory_id');
        $subsubcategory->subsubcategory_name_en = $request->input('subsubcategory_name_en');
        $subsubcategory->subsubcategory_name_bn = $request->input('subsubcategory_name_bn');
        $subsubcategory->subsubcategory_slug_en = strtolower(str_replace(' ', '-', $request->subsubcategory_name_en));
        $subsubcategory->subsubcategory_slug_bn = str_replace(' ', '-', $request->subsubcategory_name_bn);
        // dd($news);
        $subsubcategory->update();
        if ($subsubcategory) {
            $notification = array(
                'message' => 'Sub-SubCategory Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.subsubcategory')->with($notification);
        } else {
            return redirect()->back()->with('fail', 'SubCategory Updated Failed');
        }
    }


    public function SubSubCategoryDelete($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsubcategory->delete();
        if ($subsubcategory) {
            $notification = array(
                'message' => 'Sub-SubCategory Deleted Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } else {
            return redirect()->back()->with('fail', 'Sub-SubCategory Deleted Failed');
        }
    }


}
